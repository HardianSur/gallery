public function sendResetLinkEmail(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email:rfc,dns',
                ]
            );

            if ($validator->fails()) {
                AuthLogger::info('REQUEST FORGOT PASSWORD FAILED CAUSE EMAIL NOT FOUND', [$validator->errors()]);

                return $this->response->returnArray(412, 'Email Not Valid');
            }

            $user = User::where('user_email', $request->post('email'))->first();

            if (! $user) {
                AuthLogger::info('REQUEST FORGOT PASSWORD FAILED CAUSE EMAIL NOT FOUND', [
                    'email' => $request->post('email'),
                    'ip' => $request->ip(),
                    'server_timestamp' => Carbon::now(),
                ]);

                return $this->response->returnArray(400, 'Account doesn`t exists', null);
            }

            $token = Str::random(64);
            $expiredAt = now()->addHour();

            $data = new PasswordReset;
            $data->email = $user->user_email;
            $data->token = $token;
            $data->expired_at = $expiredAt;
            $data->save();

            // $actionUrl = "http://10.10.10.23:8005/api/auth/redirect/".$token."?email=".$request->post('email');
            $actionUrl = url('api/auth/redirect')."/$token?email=".$request->post('email');
            $introLines = ['You are receiving this email because we received a password reset request for your account.'];
            $actionText = 'Reset Password';

            $sent = Mail::send('email.forget_password', [
                'token' => $token,
                'introLines' => $introLines,
                'actionText' => $actionText,
                'actionUrl' => $actionUrl,
                'name' => $user->user_name,
            ], function ($message) use ($user) {
                $message->to($user->user_email);
                $message->subject('Reset Password');
            });

            AuthLogger::info('REQUEST FORGOT PASSWORD SUCCESS', [
                'user' => [
                    'id' => $user->user_id,
                    'email' => $user->user_email,
                    'ip' => $request->ip(),
                    'server_timestamp' => Carbon::now(),
                ],
            ]);

            return $this->response->returnArray(200, 'success', null);
        } catch (\Exception $e) {
            AuthLogger::error('REQUEST FORGOT PASSWORD FAILED', ['file' => $e->getFile(), 'line' => $e->getLine(), 'message' => $e->getMessage()]);

            return $this->response->returnArray(500, 'Error', null);
        }
    }



    MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email@gmail.com
MAIL_PASSWORD=ytta
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
