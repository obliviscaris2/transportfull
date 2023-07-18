<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

use Closure;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactUs::latest()->get();
        return view('admin.contactus.index', [
            "contacts" => $contacts,
            "page_title" => "Contact Us"
        ]);
    }

    public function show($id)
    {
        $contact = ContactUs::find($id);
        return view('admin.contactus.show', [
            "contact" => $contact,
            "page_title" => "Contact Details"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    // Validate reCAPTCHA response
    // $recaptcha_secret = "6LeNCWklAAAAAGJ-1BZn7ANBvgzXv0vkki2ElCAb";
    // $recaptcha_response = $request->input('g-recaptcha-response');
    // $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    // $recaptcha_data = [
    //     'secret' => $recaptcha_secret,
    //     'response' => $recaptcha_response,
    //     'remoteip' => $_SERVER['REMOTE_ADDR']
    // ];

    // $options = [
    //     'http' => [
    //         'header' => 'Content-type: application/x-www-form-urlencoded',
    //         'method' => 'POST',
    //         'content' => http_build_query($recaptcha_data)
    //     ]
    // ];

    // $context = stream_context_create($options);
    // $result = file_get_contents($recaptcha_url, false, $context);
    // $response = json_decode($result);

    // if ($response->success !== true) {
    //     // reCAPTCHA validation failed
    //     return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA validation failed']);
    // }

    // Process the form data


    $this->validate($request, [
        'name' => 'required|string',
        'email' => 'required|string',
        'phone' => 'required|string',
        'message' => 'required|string',
        'g-recaptcha-response' => 'required', function($attribute, $value, $fail) {
       
            $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => \request()->ip()
            ]);

            //    dd($g_response->json());


            if (!$g_response->json('success')) {
                $fail('The '.$attribute.' is invalid.');
            }
        },

    ]);



    $contact = new ContactUs;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    // ...

   if ($contact->save()){

    // Save the data to the database
    // ...

    return redirect()->back()->with('success', 'Your message has been sent successfully.');
}

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs, $id)
    {
        $contacts = ContactUs::find($id);
        $contacts->delete();

        return redirect('admin/contactus/index');
    }
}
