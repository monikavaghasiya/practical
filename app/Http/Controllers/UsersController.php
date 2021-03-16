<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Queries\UserDataTable;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Facades\DataTables;
use Exception;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use \Symfony\Component\HttpFoundation\Response;


class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new UserDataTable())->get())->make(true);
        }

        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $input = $request->only(['email', 'password', 'about']);
        $input['password'] = Hash::make('password');

        $user = User::create($input);

        $profilePics = $request->file('profile_pic');
        $profile = [];
        foreach ($profilePics as $profilePic){
            $profile[]['image'] = $this->uploadImage($profilePic, User::PATH);
        }

        $user->userImages()->createMany($profile);
        $userName = (explode('@',$input['email']))[0];

        $pdf = App::make('dompdf.wrapper');
        $userDetailview = view('users.show', compact('user'));
        $pdf->loadHTML($userDetailview);
        $content = $pdf->download()->getOriginalContent();

        Storage::put("pdf/$userName.pdf",$content) ;

        return redirect('users');
    }

    public function uploadImage($file, $path)
    {
        try {
            $fileName = '';
            if (! empty($file)) {
                $extension = $file->getClientOriginalExtension(); // getting image extension

                if (! in_array(strtolower($extension), ['jpg', 'gif', 'png', 'jpeg'])) {
                    throw  new Exception('invalid image', Response::HTTP_BAD_REQUEST);
                }

                $originalName = $file->getClientOriginalName();
                $date = Carbon::now()->format('Y-m-d');
                $originalName = sha1($originalName.time());
                $fileName = $date.'_'.uniqid().'_'.$originalName.'.'.$extension;

                Storage::putFileAs($path, $file, $fileName, 'public');
            }

            return $fileName;
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    public function show(User $user)
    {
        $pdf = App::make('dompdf.wrapper');
        $userDetailview = view('users.show', compact('user'));
        $pdf->loadHTML($userDetailview);
        return $pdf->stream();
    }
}
