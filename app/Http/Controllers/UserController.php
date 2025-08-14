<?php

namespace App\Http\Controllers;

use App\Http\Requests\messageRequest;
use App\Models\appointment;
use App\Models\Message;
use App\Models\Picture;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {

        $pictures = $this->getPictures();
        $authBookings = $this->selectAuthBooking();

        return view('Home', compact('pictures', 'authBookings'));
    }

    public function appointment()
    {
        $authBookings = $this->selectAuthBooking();
        return view('Appointment', compact('authBookings'));
    }

    function clinic()
    {
        $pictures = $this->getPictures();
        $authBookings = $this->selectAuthBooking();

        return view('Clinic', compact('pictures', 'authBookings'));
    }

    function contactUs()
    {
        $DocInfo = $this->getDocInfo();
        $authBookings = $this->selectAuthBooking();

        return view('contactUs', compact('DocInfo', 'authBookings'));
    }

    function Doctor()
    {
        $pictures = $this->getPictures();
        $DocInfo = $this->getDocInfo();
        $authBookings = $this->selectAuthBooking();

        return view('Doctor', compact('pictures', 'DocInfo', 'authBookings'));
    }

    private function getDocInfo()
    {
        $DocInfo = DB::table('users')
            ->select('*')
            ->where('role', 1)
            ->get();
        return $DocInfo;
    }

    public function getPictures()
    {
        $pictures = Picture::all();

        return $pictures;
    }

    public function displayMonths()
    {
        $currentYear = Carbon::now()->year;
        $monthsData = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthsData[] = [
                'year' => $currentYear,
                'month' => $month,
                'month_name' => Carbon::create($currentYear, $month)->format('F'),
            ];
        }

        return $monthsData;
    }

    public function message(messageRequest $request)
    {
        $data = [];

        if (auth()->check()) {
            $data = [
                'patient_id' => auth()->user()->id,
                'message' => $request->input('message'),
            ];
        } else {
            $data = [
                'message' => $request->input('message'),
            ];
        }

        $message = Message::create($data);

        if (!$message) {
            return redirect()->back()->withInput()->withErrors(['errorMessage' => 'Failed to create message.']);
        } else {
            return redirect()->back()->with('messageSent', __('messages.messageSent'));
        }
    }

    // select auth booking
    private function selectAuthBooking()
    {
        $user = auth()->user();

        if ($user) {
            $selectAuthBooking = appointment::where('patient_id', $user->id)->orderBy('start_date', 'ASC')->get();

            if ($selectAuthBooking->isEmpty()) {
                return [];
            }

            $authBookings = [];

            foreach ($selectAuthBooking as $item) {
                $nowDate = Carbon::now();
                $differenceDate = '';

                if ($nowDate >= $item->start_date && $nowDate <= $item->end_date) {
                    $differenceDate = 'now';
                } elseif ($nowDate < $item->start_date) {
                    $totalMinutes = $nowDate->diffInMinutes($item->start_date, false);
                    $hours = floor($totalMinutes / 60); 
                    $minutes = $totalMinutes % 60; 

                    if (App::isLocale('en')) {
                        $differenceDate = "$hours hours and $minutes minutes left";
                    } else {
                        $differenceDate = "باقي $hours ساعة و $minutes دقيقية";
                    }
                }
                if ($differenceDate != '') {
                    $authBookings[] = [
                        'date' => Carbon::parse($item->start_date)->format('d-m-Y'),
                        'start_date' => Carbon::parse($item->start_date)->format('g:i A'),
                        'end_date' => Carbon::parse($item->end_date)->format('g:i A'),
                        'differenceDate' => $differenceDate
                    ];
                }
            }
            return $authBookings;
        }
    }


    // bookings
    public function dayAppointments($dateDisplayed)
    {
        $patient = auth()->user();
        $patientId = $patient->id;

        $appointments = appointment::orderBy('start_date', 'ASC')->get();

        $bookings = array();

        foreach ($appointments as $appointment) {

            $dateFormated = Carbon::parse($appointment->start_date)->format('D d-M-Y');

            $nowDate = Carbon::now();
            $checkDate = '';
            $differenceDate = '';

            if ($nowDate >= $appointment->start_date && $nowDate <= $appointment->end_date) {
                $checkDate = 'now';
            } elseif ($nowDate > $appointment->end_date) {
                $checkDate = 'finished';
            } elseif ($nowDate < $appointment->start_date) {
                $checkDate = 'not started yet';

                $totalMinutes = $nowDate->diffInMinutes($appointment->start_date, false);
                $hours = floor($totalMinutes / 60); 
                $minutes = $totalMinutes % 60; 

                if (App::isLocale('en')) {
                    $differenceDate = "$hours hours and $minutes minutes left";
                } else {
                    $differenceDate = "باقي $hours ساعة و $minutes دقيقية";
                }
            } else {
                $checkDate = '';
            }


            if ($dateFormated == $dateDisplayed) {
                $bookings[] = [
                    'id' => $appointment->id,
                    'patientId' => $appointment->patient_id,
                    'date' => Carbon::parse($appointment->start_date)->format('Y-m-d'),
                    'start_date' => Carbon::parse($appointment->start_date)->format('g:i A'),
                    'end_date' => Carbon::parse($appointment->end_date)->format('g:i A'),
                    'status' => $appointment->status,
                    'checkDate' => $checkDate,
                    'differenceDate' => $differenceDate
                ];
            }
        }
        return view('bookings.days', compact('bookings', 'patientId'));
    }

    public function WeekAppointments($dateDisplayed)
    {
        $patient = auth()->user();
        $patientId = $patient->id;

        $appointments = appointment::orderBy('start_date', 'ASC')->get();

        $bookings = array();

        if (preg_match('/^[A-Z][a-z]{2} \d{2}-[A-Z][a-z]{2}-\d{4}$/', $dateDisplayed)) {
            $makeDate = DateTime::createFromFormat('D d-M-Y', $dateDisplayed);

            $makeDate->modify('last monday');
            $startDate = $makeDate->format('Y-m-d');

            $makeDate->modify('next sunday');
            $endDate = $makeDate->format('Y-m-d');
        } else {
            $dateParts = explode("->", $dateDisplayed);

            $startDate = trim($dateParts[0]);
            $endDate = trim($dateParts[1]);

            $startDate = date('Y-m-d', strtotime($startDate));
            $endDate = date('Y-m-d', strtotime($endDate));
        }

        foreach ($appointments as $appointment) {

            $start_date = Carbon::parse($appointment->start_date);
            $date = $start_date->format('Y-m-d');

            $nowDate = Carbon::now();
            $checkDate = '';
            $differenceDate = '';

            if ($nowDate >= $appointment->start_date && $nowDate <= $appointment->end_date) {
                $checkDate = 'now';
            } elseif ($nowDate > $appointment->end_date) {
                $checkDate = 'finished';
            } elseif ($nowDate < $appointment->start_date) {
                $checkDate = 'not started yet';

                $totalMinutes = $nowDate->diffInMinutes($appointment->start_date, false);
                $hours = floor($totalMinutes / 60); 
                $minutes = $totalMinutes % 60; 
                if (App::isLocale('en')) {
                    $differenceDate = "$hours hours and $minutes minutes left";
                } else {
                    $differenceDate = "باقي $hours ساعة و $minutes دقيقية";
                }
            } else {
                $checkDate = '';
            }

            if ($date >= $startDate && $date <= $endDate) {
                $bookings[] = [
                    'id' => $appointment->id,
                    'patientId' => $appointment->patient_id,
                    'day' => $start_date->format('D'),
                    'start_date' => Carbon::parse($appointment->start_date)->format('g:i A'),
                    'end_date' => Carbon::parse($appointment->end_date)->format('g:i A'),
                    'date' => Carbon::parse($appointment->start_date)->format('d-m-Y'),
                    'status' => $appointment->status,
                    'checkDate' => $checkDate,
                    'differenceDate' => $differenceDate
                ];
            }
        }
        return view('bookings.weeks', compact('bookings', 'patientId'));
    }

    public function booking($id, $date)
    {
        $patient = auth()->user();

        $dateFormated = Carbon::parse($date)->format('Y-m-d');

        $checkBooking = Appointment::where('patient_id', $patient->id)
            ->where('start_date', '>=', $dateFormated . ' 00:00:00')
            ->where('start_date', '<=', $dateFormated . ' 23:59:59')
            ->first();

        if ($checkBooking) {
            return response()->json('notBooked');
        } else {
            $booking = appointment::find($id);

            $booking->update([
                'patient_id' => $patient->id,
                'status' => 1,
            ]);

            return response()->json('booked');
        }
    }



    // language
    public function changeLang($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
