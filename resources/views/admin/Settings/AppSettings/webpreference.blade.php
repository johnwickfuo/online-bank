<div class="row">
    <div class="col-12">
        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- End Display Validation Errors --}}

        {{-- Changed action from javascript:void(0) to a Laravel route --}}
        <form method="post" action="{{ route('updatepreference') }}" id="updatepreference" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5 class="">Contact Email</h5>
                    <input type="text" class="form-control  " name="contact_email"
                        value="{{ $settings->contact_email }}" required>
                </div>

                <input name="s_currency" value="{{ $settings->s_currency }}" id="s_c" type="hidden">
                <div class="form-group col-md-6">
                    <h5 class="">Website Currency</h5>
                    <select name="currency" id="select_c" class="form-control   select2" onchange="changecurr()"
                        style="width: 100%">
                        <option value="<?php echo htmlentities($settings->currency); ?>">{{ $settings->currency }}</option>
                        @foreach ($currencies as $key => $currency)
                            <option id="{{ $key }}" value="<?php echo html_entity_decode($currency); ?>">
                                {{ $key . ' (' . html_entity_decode($currency) . ')' }}</option>
                        @endforeach
                    </select>

                </div>
                <input type="hidden" value="{{ $settings->site_preference }}" name="site_preference">
                <div class="form-group col-md-6">
                    <h5 class="">HomePage Url (Redirect)</h5>
                    <input type="text" class="form-control " name="redirect_url"
                        placeholder="eg https://myhomepage.com" value="{{ $settings->redirect_url }}">
                    <small>If you use a custom homepage and you want all request to be rediected to that page, please
                        enter the url here, if empty the system will use our default homepage/webpages</small>
                </div>
            </div>

            <div class="mt-3 row">
                <div class=" col-md-6">
                   {{-- Placeholder for other settings --}}
                </div>
                <div class="col-md-6">
                   {{-- Placeholder for other settings --}}
                    <div>
                       {{-- Placeholder for other settings --}}
                    </div>
                </div>

                <div class=" col-md-6">
                    {{-- Placeholder for other settings --}}
                    <div>
                       {{-- Placeholder for other settings --}}
                    </div>

                </div>

                <div class=" col-md-6">
                    {{-- Placeholder for other settings --}}
                    <div>
                        {{-- Placeholder for other settings --}}
                    </div>

                </div>

                <div class=" col-md-6">
                    {{-- Placeholder for other settings --}}
                    <div>
                        {{-- Placeholder for other settings --}}
                    </div>
                </div>

                <div class=" col-md-6">
                    {{-- Placeholder for other settings --}}
                    <div>
                       {{-- Placeholder for other settings --}}
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">KYC(Verification)</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc" value="yes" class="selectgroup-input"
                                {{ $settings->enable_kyc == 'yes' ? 'checked' : '' }}>
                            <span class="selectgroup-button">On</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc"
                                {{ $settings->enable_kyc != 'yes' ? 'checked' : '' }} value="no"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Off</span>
                        </label>
                    </div>
                    <div>
                        <small class="">if turned on, Users will need to submit required documents to get
                            verified before they can place a withdrawal request.</small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">KYC(Verification) on Registraion</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc_registration" value="yes"
                                class="selectgroup-input"
                                {{ $settings->enable_kyc_registration == 'yes' ? 'checked' : '' }}>
                            <span class="selectgroup-button">On</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc_registration"
                                {{ $settings->enable_kyc_registration != 'yes' ? 'checked' : '' }} value="no"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Off</span>
                        </label>
                    </div>
                    <div>
                        <small class="">if turned on, Users will have to go through the verification process upon
                            registration and they will not be allowed to carry out any operation on your system until
                            they have been verified by the admin. Note this will affect existing users who have not
                            completed their KYC. <strong>After they have submitted an application, you will also need to
                                verify the user from your end before they can procced.</strong>
                        </small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                   {{-- Placeholder for other settings --}}
                    <div>
                        {{-- Placeholder for other settings --}}
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Email Verification</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="enail_verify" value="true" class="selectgroup-input"
                                {{ $settings->enable_verification == 'true' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Enable</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="enail_verify"
                                {{ $settings->enable_verification != 'true' ? 'checked' : '' }} value="false"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Disable</span>
                        </label>
                    </div>
                    <div>
                        {{-- Placeholder for other settings --}}
                    </div>
                </div>
                <div class=" col-md-6">
                   {{-- Placeholder for other settings --}}
                    <div>
                        {{-- Placeholder for other settings --}}
                    </div>
                </div>
                <div class=" col-md-6">
                    {{-- Placeholder for other settings --}}
                    <div>
                        {{-- Placeholder for other settings --}}
                    </div>
                </div>

                {{-- New: Bitcoin Settings Section --}}
                <div class="col-md-12 mt-4">
                    <h4 class="mb-3">Bitcoin (BTC) Settings</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5 class="">BTC Receive Address</h5>
                            <input type="text" class="form-control" name="btc_receive_address"
                                value="{{ $settings->btc_receive_address ?? '' }}" placeholder="Enter BTC address">
                            <small>This address will be displayed to users for receiving BTC.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <h5 class="">BTC QR Code (Image)</h5>
                            <input type="file" class="form-control-file" name="btc_qr_code_path" accept="image/*">
                            @if($settings->btc_qr_code_path)
                                {{-- CORRECTED: asset() now points to public/qr_codes --}}
                                <small class="d-block mt-2">Current QR Code: <a href="{{ asset($settings->btc_qr_code_path) }}" target="_blank">View Image</a></small>
                                <img src="{{ asset($settings->btc_qr_code_path) }}" alt="Current BTC QR Code" class="mt-2" style="max-width: 150px;">
                            @else
                                <small class="d-block mt-2">No QR Code currently uploaded.</small>
                            @endif
                            <small>Upload a QR code image for the BTC receive address.</small>
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <h5 class="">BTC to Fiat Swap Rate (1 BTC = X {{ $settings->currency }})</h5>
                            <input type="number" step="any" class="form-control" name="btc_swap_rate"
                                value="{{ $settings->btc_swap_rate ?? 0 }}" placeholder="e.g., 60000">
                            <small>Set the rate for swapping 1 BTC to your primary currency (e.g., USD, EUR).</small>
                        </div>
                    </div>
                </div>
                {{-- End New: Bitcoin Settings Section --}}

            </div>
            <div class="mt-4">
                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Save">
            </div>
        </form>
    </div>
</div>

