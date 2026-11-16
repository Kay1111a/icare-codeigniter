<?php
// Explicit API contracts converted from the uploaded iCARE source.
return array (
  0 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/login',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'login',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  1 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/register',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'register',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  2 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/login/verify-otp',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'verifyOtp',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  3 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/forgot-password',
    'controller' => 'App\\Controllers\\Api\\PasswordResetController',
    'action' => 'forgot',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  4 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/reset-password',
    'controller' => 'App\\Controllers\\Api\\PasswordResetController',
    'action' => 'reset',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  5 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/schedule/{token}',
    'controller' => 'App\\Controllers\\Api\\PublicSchedulingController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  6 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/schedule/{token}/blocked-dates',
    'controller' => 'App\\Controllers\\Api\\CalendarBlockedDatesController',
    'action' => 'publicIndex',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  7 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/schedule/{token}/check-availability',
    'controller' => 'App\\Controllers\\Api\\PublicSchedulingController',
    'action' => 'checkAvailability',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  8 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/schedule/{token}/month-availability',
    'controller' => 'App\\Controllers\\Api\\PublicSchedulingController',
    'action' => 'monthAvailability',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  9 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/schedule/{token}/submit',
    'controller' => 'App\\Controllers\\Api\\PublicSchedulingController',
    'action' => 'submit',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  10 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cron/follow-up-reminders',
    'controller' => 'App\\Controllers\\Api\\CronController',
    'action' => 'followUpReminders',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  11 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cron/appointment-reminders',
    'controller' => 'App\\Controllers\\Api\\CronController',
    'action' => 'appointmentReminders',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  12 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cron/detect-no-shows',
    'controller' => 'App\\Controllers\\Api\\CronController',
    'action' => 'detectNoShows',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  13 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cron/backup',
    'controller' => 'App\\Controllers\\Api\\CronController',
    'action' => 'backup',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  14 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cron/retry-failed-emails',
    'controller' => 'App\\Controllers\\Api\\CronController',
    'action' => 'retryFailedEmails',
    'middleware' => 
    array (
      0 => 'throttle:public-form',
    ),
    'wheres' => 
    array (
    ),
  ),
  15 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/logout',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'logout',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  16 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/me',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'me',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  17 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/me/password',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'changePassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  18 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/me/profile',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'updateProfile',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  19 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/me/sessions',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'sessions',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  20 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/me/sessions/{tokenId}',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'revokeSession',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  21 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/me/sessions/revoke-others',
    'controller' => 'App\\Controllers\\Api\\AuthController',
    'action' => 'revokeOtherSessions',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  22 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/dashboard',
    'controller' => 'App\\Controllers\\Api\\DashboardController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  23 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/monitoring',
    'controller' => 'App\\Controllers\\Api\\MonitoringController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,sdu_head,tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  24 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students/missing-client-no',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'missingClientNo',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  25 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  26 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students/{student}',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  27 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students/{student}/history',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'history',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  28 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/check-duplicate-name',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'checkDuplicateName',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  29 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  30 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/students/{student}',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  31 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/students/{student}',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  32 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/import',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'import',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  33 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/{student}/remind-forms',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'remindForms',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  34 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/students/{student}/client-no',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'updateClientNo',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  35 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/bulk-client-no',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'bulkUpdateClientNo',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  36 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/{student}/toggle-active',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'toggleActive',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
      4 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  37 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students/{student}/status-history',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'statusHistory',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  38 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/{student}/graduate',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'graduate',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
      4 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  39 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/import-preview',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'importPreview',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  40 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/import-confirm',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'importConfirm',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  41 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students/{student}/temp-password',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'viewTempPassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  42 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/students/{student}/reset-password',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'resetPassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  43 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/students/{student}/password-info',
    'controller' => 'App\\Controllers\\Api\\StudentController',
    'action' => 'passwordInfo',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  44 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/dashboard',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'dashboard',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  45 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/parent-conference-slips',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'parentConferenceSlips',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  46 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/student/profile',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'updateProfile',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  47 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/my/referrals',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'mine',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  48 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/my/referrals/{id}',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'updateMine',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  49 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/my/complaints',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'mine',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  50 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/my/complaints/{complaint}',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'showMine',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  51 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/complaints/{complaint}/attachments/{attachment}',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'attachment',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  52 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/referrals',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  53 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  54 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/referrals/{referral}',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  55 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/referrals/{referral}',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  56 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/referrals/{referral}',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  57 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/acknowledge',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'acknowledge',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  58 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/referrals/{referral}/student',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'updateReferredStudent',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  59 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/referrals/{referral}/reassign-student',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'reassignStudent',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  60 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/request-void',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'requestVoid',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  61 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/approve-void',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'approveVoid',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  62 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/deny-void',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'denyVoid',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  63 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/referrals-archived',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'archived',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  64 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/archive',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'archive',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  65 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/unarchive',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'unarchive',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  66 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/assign',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'assign',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  67 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/referrals/{referral}/status',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'updateStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  68 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/override-status',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'overrideStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  69 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/referrals/{referral}/tracking',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'tracking',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  70 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/feedback',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'sendFeedback',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  71 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/request-feedback',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'requestFeedback',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  72 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/college-report',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'collegeSummary',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  73 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/admission-slip',
    'controller' => 'App\\Controllers\\Api\\ReferralController',
    'action' => 'saveAdmissionSlip',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  74 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/referrals/{referral}/session-notes',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'indexByReferral',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  75 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/referrals/{referral}/session-notes',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'storeByReferral',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  76 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/complaints',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  77 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/cases',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  78 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/cases/{case}',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  79 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/cases/{case}',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  80 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/cases/{case}/status',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'updateStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  81 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/close',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'close',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  82 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/cases/{case}/summary',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'summary',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  83 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/refer-tmdu',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'referToTmdu',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  84 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/refer-external',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'referExternal',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  85 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/handoff',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'handoff',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  86 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/handoffs/{handoff}/acknowledge',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'acknowledgeHandoff',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  87 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/flag-unreachable',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'flagUnreachable',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  88 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/flag-follow-up',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'flagFollowUp',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  89 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/resolve-follow-up',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'resolveFollowUp',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  90 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/cases/{case}/severe',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'toggleSevere',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  91 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/parent-conference-slip',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'issueParentConferenceSlip',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  92 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/parent-conference-slips/{slip}/notes',
    'controller' => 'App\\Controllers\\Api\\CaseController',
    'action' => 'saveParentConferenceNotes',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  93 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/staff-roster',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'roster',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  94 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/interventions',
    'controller' => 'App\\Controllers\\Api\\CaseInterventionController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  95 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/interventions/{intervention}/complete',
    'controller' => 'App\\Controllers\\Api\\CaseInterventionController',
    'action' => 'complete',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  96 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/interventions/{intervention}',
    'controller' => 'App\\Controllers\\Api\\CaseInterventionController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  97 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/cases/{case}/session-notes',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  98 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/cases/{case}/session-notes',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  99 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/session-notes/{sessionNote}',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  100 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/session-notes/{sessionNote}',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  101 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/session-notes/{sessionNote}',
    'controller' => 'App\\Controllers\\Api\\SessionNoteController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  102 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/appointments/availability',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'availability',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  103 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/appointments',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  104 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  105 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/appointments/{appointment}',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  106 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/appointments/{appointment}',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  107 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/confirm',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'confirm',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  108 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/reschedule',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'reschedule',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  109 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/reschedule-now',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'rescheduleNow',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  110 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/cancel',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'cancel',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  111 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/check-in',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'checkIn',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  112 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/escalate-no-show',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'escalateNoShow',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  113 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/send-call-slip',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'sendCallSlipUnscheduled',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  114 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/override-status',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'overrideStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  115 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/schedule-student',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'scheduleForStudent',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  116 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/check-conflict',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'checkConflict',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  117 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/call-slips',
    'controller' => 'App\\Controllers\\Api\\CallSlipController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  118 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/call-slips/{appointment}/contacted',
    'controller' => 'App\\Controllers\\Api\\CallSlipController',
    'action' => 'markContacted',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  119 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/call-slips/{appointment}/reschedule',
    'controller' => 'App\\Controllers\\Api\\CallSlipController',
    'action' => 'requestReschedule',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  120 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/call-slips/{appointment}/escalate',
    'controller' => 'App\\Controllers\\Api\\CallSlipController',
    'action' => 'escalateToDeptChair',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  121 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/staff-availability',
    'controller' => 'App\\Controllers\\Api\\StaffAvailabilityController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  122 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/staff-availability',
    'controller' => 'App\\Controllers\\Api\\StaffAvailabilityController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  123 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/staff-availability/{staff_availability}',
    'controller' => 'App\\Controllers\\Api\\StaffAvailabilityController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  124 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/staff-availability/{staff_availability}',
    'controller' => 'App\\Controllers\\Api\\StaffAvailabilityController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  125 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/staff-availability/{staff_availability}',
    'controller' => 'App\\Controllers\\Api\\StaffAvailabilityController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  126 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/testing-records/available-testers',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'availableTesters',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  127 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/testing-records',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  128 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/testing-records/{testingRecord}',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  129 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/testing-records/{testingRecord}',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  130 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/testing-records/{testingRecord}/assign',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'assign',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  131 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/testing-records/{testingRecord}/status',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'updateStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  132 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/testing-records/{testingRecord}/send-to-gcu',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'sendToGcu',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  133 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/testing-records/{testingRecord}/acknowledge',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'acknowledge',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  134 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/testing-records/{testingRecord}/schedule-testing',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'scheduleTesting',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  135 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/testing-records/{testingRecord}/administer-tests',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'administerTests',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  136 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/testing-records/{testingRecord}/schedule-par',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'schedulePar',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  137 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/testing-records/{testingRecord}/or-photo',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'orPhoto',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  138 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/appointments/{appointment}/par-action',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'parAction',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  139 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/case-referrals',
    'controller' => 'App\\Controllers\\Api\\CaseReferralController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  140 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/case-referrals/by-source/{referral}',
    'controller' => 'App\\Controllers\\Api\\CaseReferralController',
    'action' => 'forSource',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  141 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/case-referrals/{referral}',
    'controller' => 'App\\Controllers\\Api\\CaseReferralController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff',
    ),
    'wheres' => 
    array (
    ),
  ),
  142 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/documents/upload',
    'controller' => 'App\\Controllers\\Api\\DocumentController',
    'action' => 'upload',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,sdu_head,tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  143 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/documents/{document}',
    'controller' => 'App\\Controllers\\Api\\DocumentController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,sdu_head,tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  144 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/documents/{document}',
    'controller' => 'App\\Controllers\\Api\\DocumentController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,sdu_head,tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  145 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/documents/{document}/download',
    'controller' => 'App\\Controllers\\Api\\DocumentController',
    'action' => 'download',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,sdu_head,tmdu_staff,tmdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  146 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/notifications',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  147 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/notifications/{id}/read',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'markRead',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  148 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/notifications/read-all',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'markAllRead',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  149 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/notification-logs',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'logs',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  150 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/referrals',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'referrals',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  151 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/appointments',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'appointments',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  152 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/cases',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'cases',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  153 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/recurring-concerns',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'recurringConcerns',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  154 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/services',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'services',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  155 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/complaints',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'complaints',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  156 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/sdu-referrals',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'sduReferrals',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  157 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/gcu-accomplishment',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'gcuAccomplishment',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  158 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/dashboard',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'dashboardStats',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  159 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/export/pdf',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'exportPdf',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  160 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/reports/export/excel',
    'controller' => 'App\\Controllers\\Api\\ReportController',
    'action' => 'exportExcel',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,gcu_staff,tmdu_staff,tmdu_head,sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  161 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/colleges',
    'controller' => 'App\\Controllers\\Api\\ManagementCollegeController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  162 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/programs',
    'controller' => 'App\\Controllers\\Api\\ManagementProgramController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  163 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/departments',
    'controller' => 'App\\Controllers\\Api\\ManagementDepartmentController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  164 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/form-options',
    'controller' => 'App\\Controllers\\Api\\ManagementFormOptionController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  165 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/academic-years',
    'controller' => 'App\\Controllers\\Api\\ManagementAcademicYearController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  166 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/calendar-entries',
    'controller' => 'App\\Controllers\\Api\\ManagementCalendarEntryController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  167 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/calendar/blocked-dates',
    'controller' => 'App\\Controllers\\Api\\CalendarBlockedDatesController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  168 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/document-settings/{code}',
    'controller' => 'App\\Controllers\\Api\\DocumentSettingController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  169 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/faculty',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  170 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  171 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/faculty/check-duplicate',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'checkDuplicate',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  172 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty/import-preview',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'importPreview',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  173 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty/import-confirm',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'importConfirm',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  174 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/faculty/{user}',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  175 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty/{user}/toggle-active',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'toggle',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  176 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty/{user}/reset-password',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'resetPassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  177 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/faculty/{user}/password-info',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'passwordInfo',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  178 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/faculty/{user}/temp-password',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'tempPassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  179 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty/{user}/assign-chair',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'assignChair',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  180 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/faculty/{user}/remove-chair',
    'controller' => 'App\\Controllers\\Api\\FacultyController',
    'action' => 'removeChair',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:dean,dean_secretary,dept_chair',
    ),
    'wheres' => 
    array (
    ),
  ),
  181 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users/check-duplicate',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'checkDuplicate',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  182 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  183 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/users',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  184 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users/{user}',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  185 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
      1 => 'PATCH',
    ),
    'path' => 'api/users/{user}',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  186 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/users/{user}',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  187 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/users/{user}/toggle-active',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'toggleActive',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  188 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users/{user}/open-work',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'openWork',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  189 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users/{user}/status-history',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'statusHistory',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  190 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/users/{user}/reset-password',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'resetPassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  191 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users/{user}/password-info',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'passwordInfo',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  192 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/users/{user}/temp-password',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'viewTempPassword',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  193 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/users/import-preview',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'importPreview',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  194 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/users/import-confirm',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'importConfirm',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,tmdu_head,dean,dean_secretary',
    ),
    'wheres' => 
    array (
    ),
  ),
  195 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/users/import',
    'controller' => 'App\\Controllers\\Api\\UserController',
    'action' => 'import',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  196 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/audit-logs',
    'controller' => 'App\\Controllers\\Api\\AuditLogController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  197 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/audit-logs/filter-options',
    'controller' => 'App\\Controllers\\Api\\AuditLogController',
    'action' => 'filterOptions',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  198 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/audit-logs/summary',
    'controller' => 'App\\Controllers\\Api\\AuditLogController',
    'action' => 'summary',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  199 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/audit-logs/export/pdf',
    'controller' => 'App\\Controllers\\Api\\AuditLogController',
    'action' => 'exportPdf',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  200 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/audit-logs/export/excel',
    'controller' => 'App\\Controllers\\Api\\AuditLogController',
    'action' => 'exportExcel',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  201 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/audit-logs/{auditLog}',
    'controller' => 'App\\Controllers\\Api\\AuditLogController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  202 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/backups',
    'controller' => 'App\\Controllers\\Api\\BackupController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  203 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/backups/run',
    'controller' => 'App\\Controllers\\Api\\BackupController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  204 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/backups/restore-data',
    'controller' => 'App\\Controllers\\Api\\BackupController',
    'action' => 'restoreData',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  205 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/backups/restore-config',
    'controller' => 'App\\Controllers\\Api\\BackupController',
    'action' => 'restoreConfig',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  206 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/document-settings/{code}',
    'controller' => 'App\\Controllers\\Api\\DocumentSettingController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  207 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/document-settings/{code}/versions',
    'controller' => 'App\\Controllers\\Api\\DocumentSettingController',
    'action' => 'versions',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  208 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/document-settings/{code}/versions/{version}/activate',
    'controller' => 'App\\Controllers\\Api\\DocumentSettingController',
    'action' => 'activate',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  209 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/document-settings/{code}/versions/{version}/archive',
    'controller' => 'App\\Controllers\\Api\\DocumentSettingController',
    'action' => 'archive',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  210 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/document-settings/{code}/versions/{version}',
    'controller' => 'App\\Controllers\\Api\\DocumentSettingController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  211 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/{kind}/{id}/status',
    'controller' => 'App\\Controllers\\Api\\ManagementStatusController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
      'kind' => 'colleges|programs|departments|form\\-options|academic\\-years',
      'id' => '[0-9]+',
    ),
  ),
  212 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/{kind}/{id}/last-status-change',
    'controller' => 'App\\Controllers\\Api\\ManagementStatusController',
    'action' => 'lastChange',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
      'kind' => 'colleges|programs|departments|form\\-options|academic\\-years',
      'id' => '[0-9]+',
    ),
  ),
  213 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/colleges',
    'controller' => 'App\\Controllers\\Api\\ManagementCollegeController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  214 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/management/colleges/{college}',
    'controller' => 'App\\Controllers\\Api\\ManagementCollegeController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  215 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/management/colleges/{college}',
    'controller' => 'App\\Controllers\\Api\\ManagementCollegeController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  216 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/colleges/{college}/usage',
    'controller' => 'App\\Controllers\\Api\\ManagementCollegeController',
    'action' => 'usage',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  217 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/programs',
    'controller' => 'App\\Controllers\\Api\\ManagementProgramController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  218 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/management/programs/{program}',
    'controller' => 'App\\Controllers\\Api\\ManagementProgramController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  219 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/management/programs/{program}',
    'controller' => 'App\\Controllers\\Api\\ManagementProgramController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  220 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/programs/{program}/usage',
    'controller' => 'App\\Controllers\\Api\\ManagementProgramController',
    'action' => 'usage',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  221 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/departments',
    'controller' => 'App\\Controllers\\Api\\ManagementDepartmentController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  222 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/management/departments/{department}',
    'controller' => 'App\\Controllers\\Api\\ManagementDepartmentController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  223 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/management/departments/{department}',
    'controller' => 'App\\Controllers\\Api\\ManagementDepartmentController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  224 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/departments/{department}/usage',
    'controller' => 'App\\Controllers\\Api\\ManagementDepartmentController',
    'action' => 'usage',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  225 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/academic-years',
    'controller' => 'App\\Controllers\\Api\\ManagementAcademicYearController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  226 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/management/academic-years/{academicYear}',
    'controller' => 'App\\Controllers\\Api\\ManagementAcademicYearController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  227 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/management/academic-years/{academicYear}',
    'controller' => 'App\\Controllers\\Api\\ManagementAcademicYearController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  228 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/academic-years/{academicYear}/usage',
    'controller' => 'App\\Controllers\\Api\\ManagementAcademicYearController',
    'action' => 'usage',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  229 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/academic-years/{academicYear}/current',
    'controller' => 'App\\Controllers\\Api\\ManagementAcademicYearController',
    'action' => 'setCurrent',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  230 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/calendar-entries',
    'controller' => 'App\\Controllers\\Api\\ManagementCalendarEntryController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  231 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/management/calendar-entries/{entry}',
    'controller' => 'App\\Controllers\\Api\\ManagementCalendarEntryController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  232 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/calendar-entries/{entry}/archive',
    'controller' => 'App\\Controllers\\Api\\ManagementCalendarEntryController',
    'action' => 'archive',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  233 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/calendar-entries/{entry}/reactivate',
    'controller' => 'App\\Controllers\\Api\\ManagementCalendarEntryController',
    'action' => 'reactivate',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  234 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/management/calendar-entries/{entry}',
    'controller' => 'App\\Controllers\\Api\\ManagementCalendarEntryController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  235 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/management/form-options',
    'controller' => 'App\\Controllers\\Api\\ManagementFormOptionController',
    'action' => 'store',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  236 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/management/form-options/{formOption}',
    'controller' => 'App\\Controllers\\Api\\ManagementFormOptionController',
    'action' => 'update',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  237 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/management/form-options/{formOption}',
    'controller' => 'App\\Controllers\\Api\\ManagementFormOptionController',
    'action' => 'destroy',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  238 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/management/form-options/{formOption}/usage',
    'controller' => 'App\\Controllers\\Api\\ManagementFormOptionController',
    'action' => 'usage',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:admin,system_admin',
    ),
    'wheres' => 
    array (
    ),
  ),
  239 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/complaints',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  240 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/complaints/{complaint}',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  241 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/complaints/{complaint}/status',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'updateStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  242 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/incident-reports',
    'controller' => 'App\\Controllers\\Api\\IncidentReportController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  243 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/incident-reports/{student}',
    'controller' => 'App\\Controllers\\Api\\IncidentReportController',
    'action' => 'show',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  244 => 
  array (
    'methods' => 
    array (
      0 => 'PATCH',
    ),
    'path' => 'api/incident-reports/{student}/status',
    'controller' => 'App\\Controllers\\Api\\IncidentReportController',
    'action' => 'updateStatus',
    'middleware' => 
    array (
      0 => 'auth:sanctum',
      1 => 'actor:staff',
      2 => 'password.fresh',
      3 => 'role:sdu_head',
    ),
    'wheres' => 
    array (
    ),
  ),
  245 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/login',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'login',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  246 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/register',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'register',
    'middleware' => 
    array (
      0 => 'throttle:login',
    ),
    'wheres' => 
    array (
    ),
  ),
  247 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/referrals/{id}',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'showReferral',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  248 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/referrals',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'referSelf',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  249 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/outreach/lookup',
    'controller' => 'App\\Controllers\\Api\\StudentOutreachController',
    'action' => 'lookup',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
      3 => 'throttle:30,1',
    ),
    'wheres' => 
    array (
    ),
  ),
  250 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/outreach/options',
    'controller' => 'App\\Controllers\\Api\\StudentOutreachController',
    'action' => 'formOptions',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  251 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/outreach/referrals',
    'controller' => 'App\\Controllers\\Api\\StudentOutreachController',
    'action' => 'refer',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  252 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/outreach/referrals',
    'controller' => 'App\\Controllers\\Api\\StudentOutreachController',
    'action' => 'sentReferrals',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  253 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/student/outreach/referrals/{id}',
    'controller' => 'App\\Controllers\\Api\\StudentOutreachController',
    'action' => 'updateSent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  254 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/outreach/referrals/{id}/request-cancellation',
    'controller' => 'App\\Controllers\\Api\\StudentOutreachController',
    'action' => 'requestCancellation',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  255 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/outreach/complaints',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'storeByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  256 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/outreach/complaints',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'mineByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  257 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/outreach/complaints/{complaint}',
    'controller' => 'App\\Controllers\\Api\\ComplaintController',
    'action' => 'showMineByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  258 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/appointments/{id}',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'showAppointment',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  259 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/appointments',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'indexByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  260 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/calendar/blocked-dates',
    'controller' => 'App\\Controllers\\Api\\CalendarBlockedDatesController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  261 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/appointments',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'storeByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  262 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/appointments/check-conflict',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'checkConflictByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  263 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/appointments/{appointment}/request-reschedule',
    'controller' => 'App\\Controllers\\Api\\AppointmentController',
    'action' => 'requestRescheduleByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  264 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/logout',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'logout',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  265 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/me',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'me',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  266 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/sessions',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'sessions',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  267 => 
  array (
    'methods' => 
    array (
      0 => 'DELETE',
    ),
    'path' => 'api/student/sessions/{tokenId}',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'revokeSession',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  268 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/sessions/revoke-others',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'revokeOtherSessions',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  269 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/dashboard',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'dashboard',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  270 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/student/password',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'changePassword',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  271 => 
  array (
    'methods' => 
    array (
      0 => 'PUT',
    ),
    'path' => 'api/student/profile',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'updateProfile',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  272 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/notifications',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'index',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  273 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/notifications/{id}/read',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'markRead',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  274 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/notifications/read-all',
    'controller' => 'App\\Controllers\\Api\\NotificationController',
    'action' => 'markAllRead',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  275 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/testing-records',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'testingRecords',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  276 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/testing-records/{id}',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'showTestingRecord',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  277 => 
  array (
    'methods' => 
    array (
      0 => 'GET',
    ),
    'path' => 'api/student/testing-records/{id}/par',
    'controller' => 'App\\Controllers\\Api\\StudentAuthController',
    'action' => 'downloadPar',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
  278 => 
  array (
    'methods' => 
    array (
      0 => 'POST',
    ),
    'path' => 'api/student/testing-records/{testingRecord}/request-testing',
    'controller' => 'App\\Controllers\\Api\\TestingRecordController',
    'action' => 'requestTestingByStudent',
    'middleware' => 
    array (
      0 => 'auth:student',
      1 => 'actor:student',
      2 => 'password.fresh',
    ),
    'wheres' => 
    array (
    ),
  ),
);
