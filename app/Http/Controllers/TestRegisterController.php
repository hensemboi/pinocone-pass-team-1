<?php
namespace App\Http\Controllers;

use App\Models\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';

class TestRegisterController extends Controller
{
    public function index(){
        return view('testregister.index',[
    
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:25|unique:test_users',
            'email' => 'required|email:dns|unique:test_users',
            'password' => 'required|min:10|max:255'
        ]);
            
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $query = TestUser::select('*')->where('email', $validatedData['email'])->get();
        $result = sizeof($query, 0);
        
        if ($result < 1)
        {
            $token = md5($validatedData['email']).rand(10,9999);
            $link = "<a href='localhost/verify.php?key=".$validatedData['email']."&token=".$token."'>Click and Verify Email</a>";

            $user = new TestUser;
            $user->name = $validatedData['name'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'];
            $user->verification_token = $token;
            $user->save();

            $mail = new PHPMailer();
            $mail->Username = "passteamone1@gmail.com";
            $mail->Password = "Passteamone1!";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = "587";
            $mail->CharSet = "utf-8";
            $mail->IsHTML(true);
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->IsSMTP();
            $mail->From = 'passteamone1@gmail.com';
            $mail->FromName = 'Pinocone Catering Company';
            $mail->AddAddress($validatedData['email'], $validatedData['name']);
            $mail->Subject = 'Email Verification';
            $mail->Body = 'Click on this link to verify your email '.$link.'';
            
            if ($mail->Send())
            {
                return redirect('/')->with('success', 'Registration successful! You may login now. Also, check your email and click on the email verification link.');
            }

            else
            {
                return redirect('/')->with('error', 'Mail Error -> '.$mail->ErrorInfo);
            }
        }

        else
        {
            return redirect('/')->with('error', 'You have already registered with us. Check your email box and verify your email.');
        }  
    }
}
