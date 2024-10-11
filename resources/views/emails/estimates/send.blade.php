@component('mail::message')
# Estimate for {{ $estimate->client_name }}

Here's your estimate details:

**Total Amount:** {{ $estimate->total_amount }}

**Valid Until:** {{ $estimate->valid_until }}

Thank you for your business!

Regards,
Your Company
@endcomponent
Step 9: Configure email settings:

Make sure you have set up your mail configuration in the .env file or config/mail.php to use a valid email service like SMTP or other drivers.

That's it! With these steps, you have a basic setup to create and send estimates in Laravel.





