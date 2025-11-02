<?php 

use CodeIgniter\Email\Email;

if (!function_exists('send_email')) {
    function send_email($to, $subject, $message, $from = '', $config = [])
    {
        // Create an instance of the Email class
        $email = \Config\Services::email();

        // Default email configuration
        $default_config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => 'smtp.hostinger.com',
            'SMTPPort'   =>  465,
            'SMTPUser'   => 'support@skillkr.com',
            'SMTPPass'   => 'SkillKR@Supp0rt@77',
            'SMTPCrypto' => 'ssl',
            'mailType'   => 'html',
            'charset'    => 'utf-8',
            'wordWrap'   => true,
            'newline'    => "\r\n",
            'crlf'       => "\r\n",
        ];

        // Merge with any custom config
        $config = array_merge($default_config, $config);

        // Initialize email configuration
        $email->initialize($config);

        // Set sender
        $from_email = $from ?: $config['SMTPUser']; // Use default if not provided
        $email->setFrom($from_email, 'Skillkr'); // You can change the sender name here

        // Set recipient, subject, and message
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);

        // Send email
        if ($email->send()) {
            return true;
        } else {
            // Debug info if email fails
            log_message('error', $email->printDebugger(['headers']));
            return false;
        }
    }
}



?>