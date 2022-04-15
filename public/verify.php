<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <title>Email Verification</title>
</head>

<body>
    <?php
        use App\Models\TestUser;

        if ($_GET['key'] && $_GET['token'])
        {
            $email = $_GET['key'];
            $token = $_GET['token'];
            $d = date('Y-m-d H:i:s');

            $query = TestUser::select('*')->where('email', $email)->where('verification_token', $token)->get();
            $result = sizeof($query, 0);
           
            if ($result > 0)
            {
                if ($query[0][4] == NULL)
                {
                    $user = TestUser::where('email', $email)->first();
                    $user->email_verified_at = $d;
                    
                    $msg = "Congratulations! Your email has been verified.";
                }
                
                else{
                    $msg = "You have already verified your account with us.";
                }
            }
            
            else {
                $msg = "This email has been not registered with us.";
            }
        }

        else
        {
            $msg = "Something went wrong.";
        }
    ?>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-center">
                Email Verification
            </div>

            <div class="card-body">
                <p><?php echo $msg;?></p>
            </div>
        </div>
    </div>
</body>
</html>