<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeAuthController extends Controller
{
    public function handle(Request $request) {

        // TODO: Assert the state matches the state you provided in the OAuth link (optional).
//        if (!stateMatches($state))
//            return $response->withStatus(403)->withJson(array('error' => 'Incorrect state parameter: ' . $state));

        // Send the authorization code to Stripe's API.
        $code = $request->input('code');

        try {
            $stripeResponse = \Stripe\OAuth::token([
                'grant_type' => 'authorization_code',
                'code' => $code,
            ]);
        } catch (\Exception $e) {
            Log::error('ERROR StripeAuthController@handle 400');
            return response(array('error' => 'Invalid authorization code: ' . $code))->status(400);
        } catch (\Exception $e) {
            Log::error('ERROR StripeAuthController@handle 500');
            return response(array('error' => 'An unknown error occurred.'))->status(500);
        }

        $connectedAccountId = $stripeResponse->stripe_user_id;
        auth()->user()->update(['stripe_account_id' => $connectedAccountId]);

        // Render some HTML or redirect to a different page.
        return redirect('/home');
    }
}
