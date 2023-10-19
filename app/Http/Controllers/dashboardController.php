<?php

namespace App\Http\Controllers;

use App\Http\Requests\appointmentsRequest;
use App\Http\Requests\changePass;
use App\Http\Requests\editActionInfo;
use App\Http\Requests\picturesRequest;
use App\Http\Requests\updateDocProfile;
use App\Models\appointment;
use App\Models\pictures;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class dashboardController extends Controller
{
    function addPatient() {
        return view('Admin.addPatient');
    }

    function search() {
        return view('Admin.search');
    }

    function editPage($id) {
        $user = User::where('id', $id)->get();
        return view('Admin.searchActions.edit', compact('user'));
    }

    function deletePage($id) {
        return view('Admin.searchActions.delete', compact('id'));
    }

    function messages() {
        $messages = $this->getMessages();
        return view('Admin.messages', compact('messages'));
    }

    function profile() {
        $pictures = $this->getPictures();
        return view('Admin.profile', compact('pictures'));
    }

    function security() {
        return view('Admin.security');
    }

    public function getSearch(Request $request) {
        $query = $request->input('query');
        $filterBy = $request->input('filterBy');

        if(!$filterBy) {
            $filterBy = 'email';
        }

        if($query) {
            $searchResults = User::where($filterBy, 'like', '%' . $query . '%')->take(10)->get();
            return view('Admin.searchActions.searchContent', compact('searchResults'));
        }
    }

    public function getAllUser() {
        $searchResults = User::orderBy('id', 'desc')->take(10)->get();

        return view('Admin.searchActions.searchContent', compact('searchResults'));
    }

    public function editActionInfo(editActionInfo $request, $id) {

        $user = User::find($id);

        $data = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ];
        $user->update($data);

        return redirect()->back()->with('updatedPatient', __('messages.editSuccess'));
    }


    function editActionPass(changePass $request, $id) {

        $user = User::find($id);

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withInput()->withErrors(['incorrectPass' => __('messages.inccorectCurrPass')]);
        } else {
            $affectedPass = DB::table('users')
                ->where('id', $id)
                ->update([
                    'password' => bcrypt($request->input('new_password')),
                ]);
            if ($affectedPass) {
                return redirect()->back()->with('changedPass', __('messages.changedPass'));
            } else {
                return redirect()->back()->with('notChanged', 'Failed to change information.');
            }
        }
    }

    function deleteAction($id) {

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('errorDelete', 'User not found');
        }

        $user->delete();

        return redirect()->route('search')->with('deleted', __('messages.deleteSuccess'));
    }

    private function getMessages() {
        $messages = DB::table('messages')
        ->join('users', 'messages.patient_id', '=', 'users.id')
        ->select('messages.*', 'users.*')
        ->get();

        return $messages;
    }

    private function getPictures() {
        $pictures = pictures::all();

        return $pictures;
    }

    public function updateInformation(updateDocProfile $request, picturesRequest $request1) {
        $affected = $this->updateInfo($request);
        $updatePic = $this->updatePicture($request1);

        if($affected) {
            return redirect()->back()->with('updated', __('messages.updatedInfo'));
        } else {
            return redirect()->back()->with('notUpdated', 'Information not updated.');
        }
        if($updatePic) {
            return redirect()->back()->with('updatedPic', 'Pictures updated successfully.');
        } else {
            return redirect()->back()->with('notUpdatedPic', 'Pictures not updated.');
        }
        if($affected && $updatePic) {
            return redirect()->back()->with('updatedAll', 'All data updated successfully.');
        } else {
            return redirect()->back()->with('notUpdatedAll', 'data not updated.');
        }
    }

    private function updatePicture($request1) {

        $pic = pictures::find(1);
        $data = [];
        $updated = false;

        if ($pic) {
            if ($request1->file('homePhoto')) {
                $originalFileName = $request1->file('homePhoto')->getClientOriginalName();

                $uniqueFileName = $originalFileName;

                $filePath = 'storage/assets/images/' . $uniqueFileName;
                $data['homePhoto'] = $filePath;

                $request1->file('homePhoto')->storeAs('public/assets/images', $uniqueFileName);

            }

            if ($request1->file('ourDocPhoto')) {
                $originalFileName = $request1->file('ourDocPhoto')->getClientOriginalName();
                $uniqueFileName = $originalFileName;

                $filePath = 'storage/assets/images/' . $uniqueFileName;
                $data['ourDocPhoto'] = $filePath;

                $request1->file('ourDocPhoto')->storeAs('public/assets/images', $uniqueFileName);
            }

            if ($request1->file('clinic1')) {
                $originalFileName = $request1->file('clinic1')->getClientOriginalName();
                $uniqueFileName = $originalFileName;

                $filePath = 'storage/assets/images/' . $uniqueFileName;
                $data['clinic1'] = $filePath;

                $request1->file('clinic1')->storeAs('public/assets/images', $uniqueFileName);
            }

            if ($request1->file('clinic2')) {
                $originalFileName = $request1->file('clinic2')->getClientOriginalName();
                $uniqueFileName = $originalFileName;

                $filePath = 'storage/assets/images/' . $uniqueFileName;
                $data['clinic2'] = $filePath;

                $request1->file('clinic2')->storeAs('public/assets/images', $uniqueFileName);
            }

            if ($request1->file('clinic3')) {
                $originalFileName = $request1->file('clinic3')->getClientOriginalName();
                $uniqueFileName = $originalFileName;

                $filePath = 'storage/assets/images/' . $uniqueFileName;
                $data['clinic3'] = $filePath;

                $request1->file('clinic3')->storeAs('public/assets/images', $uniqueFileName);
            }

            if (!empty($data)) {
                $updated = $pic->update($data);
            }
        }
        return $updated;
    }

    private function updateInfo($request) {

        $user = Auth::user();

        $affected = DB::table('users')
            ->where('id', $user->id)
            ->update([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);
        return $affected;
    }

    public function changePass(changePass $request) {

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withInput()->withErrors(['incorrectPass' => __('messages.inccorectCurrPass')]);
        } else {
            $affectedPass = DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'password' => bcrypt($request->input('new_password')),
            ]);
            if ($affectedPass) {
                return redirect()->route('profile')->with('changed', __('messages.changedPass'));
            } else {
                return redirect()->back()->with('notChanged', 'Failed to change information.');
            }
        }
    }

    function DashAppointment() {
        return view('Admin.appointment');
    }

    function getAppointments($dateDisplayed) {

        $appointments = appointment::orderBy('start_date', 'ASC')->get();

        $bookings = array();

        foreach($appointments as $appointment) {
            if ($appointment->patient_id != null) {
                $firstName = User::where('id', $appointment->patient_id)->value('firstName');
                $lastName = User::where('id', $appointment->patient_id)->value('lastName');
                $email = User::where('id', $appointment->patient_id)->value('email');
                $phone = User::where('id', $appointment->patient_id)->value('phone');
            } else {
                $firstName = null;
                $lastName = null;
                $email = null;
                $phone = null;
            }

            $dateFormated = Carbon::parse($appointment->start_date)->format('D d-M-Y');

            $nowDate = Carbon::now();
            $checkDate = '';

            if ($nowDate >= $appointment->start_date && $nowDate <= $appointment->end_date) {
                $checkDate = 'now';
            } elseif ($nowDate > $appointment->end_date) {
                $checkDate = 'finished';
            } elseif ($nowDate < $appointment->start_date) {
                $checkDate = 'not started yet';
            } else {
                $checkDate = '';
            }


            if($dateFormated == $dateDisplayed) {
                $bookings[] = [
                    'id' => $appointment->id,
                    'start_date' => Carbon::parse($appointment->start_date)->format('g:i A'),
                    'end_date' => Carbon::parse($appointment->end_date)->format('g:i A'),
                    'status' => $appointment->status,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'phone' => $phone,
                    'checkDate' => $checkDate
                ];
            }
        }
        return view('Admin.bookings.days', compact('bookings'));
    }

    function getWeekAppointments($dateDisplayed) {

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

        foreach($appointments as $appointment) {
            if ($appointment->patient_id != null) {
                $firstName = User::where('id', $appointment->patient_id)->value('firstName');
                $lastName = User::where('id', $appointment->patient_id)->value('lastName');
                $email = User::where('id', $appointment->patient_id)->value('email');
                $phone = User::where('id', $appointment->patient_id)->value('phone');
            } else {
                $firstName = null;
                $lastName = null;
                $email = null;
                $phone = null;
            }

            $start_date = Carbon::parse($appointment->start_date);
            $date = $start_date->format('Y-m-d');

            $nowDate = Carbon::now();
            $checkDate = '';

            if ($nowDate >= $appointment->start_date && $nowDate <= $appointment->end_date) {
                $checkDate = 'now';
            } elseif ($nowDate > $appointment->end_date) {
                $checkDate = 'finished';
            } elseif ($nowDate < $appointment->start_date) {
                $checkDate = 'not started yet';
            } else {
                $checkDate = '';
            }

            if($date >= $startDate && $date <= $endDate) {
                $bookings[] = [
                    'id' => $appointment->id,
                    'day' => $start_date->format('D'),
                    'start_date' => Carbon::parse($appointment->start_date)->format('g:i A'),
                    'end_date' => Carbon::parse($appointment->end_date)->format('g:i A'),
                    'date' => Carbon::parse($appointment->start_date)->format('d-m-Y'),
                    'status' => $appointment->status,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'phone' => $phone,
                    'checkDate' => $checkDate
                ];
            }
        }
        return view('Admin.bookings.weeks', compact('bookings'));
    }

    public function makeAppointment(appointmentsRequest $request) {
        $currentDateTime = Carbon::now();

        $start_date = Carbon::createFromFormat('Y-m-d H:i', $request->input('start_date') . ' ' . $request->input('start_time'));
        $end_date = Carbon::createFromFormat('Y-m-d H:i', $request->input('start_date') . ' ' . $request->input('end_time'));

        $existingStartDateOverlap = appointment::where('start_date', '<', $start_date)
        ->where('end_date', '>', $start_date)
        ->first();

        $existingEndDateOverlap = appointment::where('start_date', '<', $end_date)
        ->where('end_date', '>', $end_date)
        ->first();

        $existingEndStartDateOverlap = appointment::where('start_date', '>=', $start_date)
        ->where('end_date', '<=', $end_date)
        ->first();

        if($request->input('start_time') == $request->input('end_time')) {
            return response()->json('errorTime');

        } elseif ($start_date->isAfter($end_date)) {
            return response()->json('errorTimeAfter');

        } elseif ($start_date->isBefore($currentDateTime)) {
            return response()->json('errorTimeBefore');

        } elseif ($existingStartDateOverlap || $existingEndDateOverlap || $existingEndStartDateOverlap) {
            return response()->json('errorUnique');

        } else {
            $data = [
                'start_date' => $start_date,
                'end_date' => $end_date,
            ];

            appointment::create($data);

            return response()->json('maked');
        }
    }

    public function updateAppointment($id) {
        $booking = appointment::find($id);

        if(!$booking) {
            return response()->json([
                'error' => 'Unable to locate the booking'
            ], 404);
        }

        $booking->update([
            'patient_id' => null,
            'status' => 0,
        ]);

        return response()->json('updated');
    }

    public function deleteAppointment($id) {
        $booking = appointment::find($id);
        $booking->delete();

        return response()->json('deleted');
    }
}
