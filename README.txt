
Sales AI Web App - Deployment Instructions

1. Upload all files to your GoDaddy hosting under the subdomain folder: public_html/salesai.aidfinancialservices.com/

2. Open 'proxy.php' and replace the line:
   $apiKey = "sk-replace-this-with-your-real-api-key";
   with your real OpenAI API key (keep it private).

3. Make sure your hosting supports PHP and cURL.

4. Test the app by visiting https://salesai.aidfinancialservices.com

5. Embed it in Go High Level using:
<iframe src="https://salesai.aidfinancialservices.com" width="100%" height="800" style="border:none;"></iframe>

Supports speech-to-text in Chrome and mobile browsers.
