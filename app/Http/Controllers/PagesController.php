<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://140.118.109.185/api/']);
    }


    public function getIndex()
    {
//        process variable data or params
//        talk to the model
//        receive from model
//        compile or process data from the model if needed
//        pass that data to the correct view
        return view('pages.welcome');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getUser()
    {
        if (\Session('user_id')) {
            $response = $this->client->request('GET', 'users/' . \Session::get('user_id'));
            $result = json_decode($response->getBody());
            foreach ($result->activities as $activity){
                if($activity->applied_count == $activity->people){
                    $activity->people = "Full";
                }elseif($activity->applied_count != 0){
                    $activity->people = $activity->people-$activity->applied_count;
                }
            }
            if ($result->error) {
                return redirect()->to('/')->with('user', $result->messgae);
            } else {
                return view('pages.user')->with('user', $result->user)->with('activities', $result->activities);
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateUser(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:255',
        ]);
        if ($v->passes()) {
            $response = $this->client->request('POST', 'users', [
                'form_params' => [
                    'user_id' => \Session::get('user_id'),
                    'password' => $request->input('password'),
                    'username' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email')
                ]
            ]);
            $user = json_decode($response->getBody());
            if (!$user->error) {
                \Session::put('username', $request->input('name'));
                return redirect()->to('/user');
            } else {
                return redirect()->to('/user')->with('message', $user->message);
            }
        } else {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
    }

    public function getActivities()
    {
        $response = $this->client->request('GET', 'activities');
        $activities = json_decode($response->getBody());
        foreach ($activities->activities as $activity){
            if($activity->applied_count == $activity->people){
                $activity->people = "Full";
            }elseif($activity->applied_count != 0){
                $activity->people = $activity->people-$activity->applied_count;
            }
        }
        return view('pages.activity')->with('activities', $activities);
    }

    public function getNewActivity()
    {
        if (\Session('user_id')) {
            return view('pages.new-activity');

        } else {
            return redirect()->to('/login');
        }
    }

    public function insertActivity(Request $request)
    {
        $v = Validator::make($request->all(), [
            'tag' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'location' => 'required',
            'time' => 'required',
            'numOfMember' => 'required',
        ]);
        if ($v->passes()) {
            $response = $this->client->request('POST', 'activities/new', [
                'form_params' => [
                    'type' => $request->input('tag'),
                    'topic' => $request->input('topic'),
                    'description' => $request->input('description'),
                    'location' => $request->input('location'),
                    'time' => $request->input('time'),
                    'people' => $request->input('numOfMember'),
                    'status' => "running",
                    'user_id' => \Session::get('user_id')
                ]
            ]);
            $result = json_decode($response->getBody());
            return redirect()->to('/activities/' . $result->activity_id);
        } else {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
    }

    public function getActivity($id)
    {
        if (\Session::get('user_id')) {
            $response = $this->client->request('GET', 'activities/' . $id);
            $activity = json_decode($response->getBody());
            if (!$activity->error) {
                $activity = $activity->activity;
                $activity->have_apply = false;
                foreach ($activity->applicants as $applicant) {
                    if ($applicant->id == \Session::get('user_id') && !$applicant->applied) {
                        $activity->have_apply = true;
                        break;
                    }
                }
                $count = 0;
                foreach ($activity->applicants as $applicant) {
                    if ($applicant->applied) {
                        $count++;
                    }
                }
                if($count == $activity->people){
                    $activity->people = "Full";
                }elseif($count != 0){
                    $activity->people = $activity->people-$count;
                }

                return view('pages.activity-detail', compact('activity'));
            } else {
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/login');
        }

    }

    public function showUpdateActivity($id)
    {
        if (\Session::get('user_id')) {
            $response = $this->client->request('GET', 'activities/' . $id);
            $activity = json_decode($response->getBody());
            if (!$activity->error) {
                $activity = $activity->activity;
                return view('pages.activity-management', compact('activity'));
            } else {
                return redirect()->to('/user')->with("message", $activity->message);
            }
        } else {
            return redirect()->to('/login');
        }

    }

    public function updateActivity(Request $request)
    {
        $v = Validator::make($request->all(), [
            'activity_id' => 'required',
            'tag' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'location' => 'required',
            'time' => 'required',
            'numOfMember' => 'required',
        ]);
        if ($v->passes()) {
            $response = $this->client->request('POST', 'activities/update', [
                'form_params' => [
                    'activity_id' => $request->input('activity_id'),
                    'type' => $request->input('tag'),
                    'topic' => $request->input('topic'),
                    'description' => $request->input('description'),
                    'location' => $request->input('location'),
                    'time' => $request->input('time'),
                    'people' => $request->input('numOfMember'),
                    'user_id' => \Session::get('user_id')
                ]
            ]);
            $result = json_decode($response->getBody());
            var_dump($result);
            return redirect()->to('/user/activity/' . $request->input('activity_id'));
        } else {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
    }

    public function insertComment(Request $request)
    {
        $v = Validator::make($request->all(), [
            'comment' => 'required',
            'activity_id' => 'required',
        ]);
        if ($v->passes()) {
            $response = $this->client->request('POST', 'comments', [
                'form_params' => [
                    'comment' => $request->input('comment'),
                    'activity_id' => $request->input('activity_id'),
                    'user_id' => \Session::get('user_id')
                ]
            ]);
            $result = json_decode($response->getBody());
            if (!$result->error) {
                return redirect()->to('/activities/' . $request->input('activity_id'));
            } else {
                return redirect()->back()->with('message', $result->message);
            }

        } else {
            return "fuck";
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
    }
}