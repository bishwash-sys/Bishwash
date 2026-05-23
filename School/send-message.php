<?php
// जाँच करें कि फ़ॉर्म POST विधि के माध्यम से सबमिट किया गया है या नहीं
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. फ़ॉर्म डेटा प्राप्त करें
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $company = trim($_POST['company']);
    $message = trim($_POST['message']);

    // 2. सरल सत्यापन (Validation)
    if (empty($name) || empty($email) || empty($message)) {
        // यदि कोई आवश्यक फ़ील्ड खाली है
        die("Error: Please fill in all required fields (Name, E-mail, Message).");
    }

    // 3. डेटा संसाधित करें (इस उदाहरण में, एक ईमेल भेजें)
    
    $to = "bishwaahmagar456@gmail.com"; // वह ईमेल जहाँ आप संदेश प्राप्त करना चाहते हैं
    $subject = "New Contact Form Submission from " . $name;
    
    // ईमेल बॉडी बनाना
    $email_body = "You have received a new message.\n\n" .
                  "Name: " . $name . "\n" .
                  "E-mail: " . $email . "\n" .
                  "Company: " . ($company ? $company : "N/A") . "\n" .
                  "Message:\n" . $message;

    // ईमेल हेडर बनाना
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    
    // mail() फ़ंक्शन का उपयोग करके ईमेल भेजें
    if (mail($to, $subject, $email_body, $headers)) {
        // सफलता संदेश
        echo "Thank you for contacting us, " . htmlspecialchars($name) . "! Your message has been sent successfully.";
    } else {
        // विफलता संदेश
        echo "Oops! Something went wrong and your message could not be sent.";
    }

} else {
    // यदि कोई उपयोगकर्ता सीधे इस फ़ाइल पर पहुँचता है (POST के बिना)
    echo "Access Denied.";
}
?>
