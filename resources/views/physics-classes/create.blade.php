@extends('layouts.app')
@section('title',__("Physics Tutorials Reservation"))
@section('head')
<link rel="stylesheet" href="{{ mix('css/forms.css') }}">
@endsection

@php
    $chaptersStr = '[';
    foreach ($chapters as $key => $chapter) {
        $chapter->key = $key;
        $chaptersStr .= collect($chapter,$key)->toJson() . ',';
    }
    $chaptersStr = rtrim($chaptersStr, ',') . ']';
@endphp
@section('scripts-First')
<script>
    window.AllChapters = {!! $chaptersStr !!};
    window.locale = '{{ App::getLocale() }}';
</script>
<script src="{{ mix('js/physicsClasses.js') }}"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row my-1">
        <div class="col-12 col-md-auto">
            <h2>@lang('Add New Slot for Physics Classes')</h2>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-12 col-md-6 text-{{ App::isLocale('ar') ? 'right' : 'left' }}">
            <form action="{{ route('physics.store') }}" method="POST" v-on:submit.prevent="validate($event)">
                <div class="alert alert-danger" role="alert" v-if="error">
                    @lang("Please, fill all the data.")
                </div>
                @csrf
                <div class="form-group mb-1" :class="{'focused': date != null}" dir="ltr">
                    <label for="date">@lang('Select Range of dates that suits you')</label>
                    <Date-Time-Picker
                        v-model="date"
                        formatted="DD-MM-YYYY"
                        output-format="DD-MM-YYYY"
                        :only-date="true"
                        min-date="{{ \Carbon\Carbon::now()->toDateString() }}"
                        :range="true"
                        :right="true"
                        dark
                        ref="date"
                        input-size="sm">
                        <input type="text" v-bind:value="dateFormatted" class="form-control" :class="{'filled': date != null}" name="date" id="date" readonly>
                    </Date-Time-Picker>
                </div>

                <div class="form-group" :class="{'focused': start_time != null}">
                    <label for="start_time">@lang('Perferred Class Start Time')</label>
                    <Date-Time-Picker
                        v-model="start_time"
                        formatted="h:mm A"
                        format="h:mm A"
                        :only-time="true"
                        :minute-interval="30"
                        input-size="sm"
                        dark
                        ref="start_time">
                        <input type="text" v-bind:value="start_time" class="form-control" :class="{'filled': start_time != null}" name="start_time" id="start_time" readonly>
                    </Date-Time-Picker>
                </div>

                <div class="form-group" :class="{'focused': end_time != null}">
                    <label for="end_time">@lang('Perferred Class End Time')</label>
                    <Date-Time-Picker
                        v-model="end_time"
                        formatted="h:mm A"
                        format="h:mm A"
                        :only-time="true"
                        :minute-interval="30"
                        input-size="sm"
                        dark
                        ref="end_time">
                        <input type="text" v-bind:value="end_time" class="form-control" :class="{'filled': end_time != null}" name="end_time" id="end_time" readonly>
                    </Date-Time-Picker>
                </div>

                {{-- <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" name="booked" v-model="isBooked">
                    @lang("Already Booked")
                  </label>
                </div> --}}

                {{-- <div v-if="isBooked"> --}}
                <div>
                    <div class="form-group mb-0">
                        <multiselect
                            v-model="chapters"
                            :options="AllChapters"
                            :label="chapterNames"
                            track-by="key"
                            :close-on-select="false"
                            :multiple="true"
                            select-label="@lang('Press enter to select')"
                            selected-label="@lang('Selected')"
                            deselect-label="@lang('Press enter to remove')"
                            placeholder="@lang('Select chapters you need help with')">
                        <template slot="noResult">
                            @lang("Nothing matches your search :/")
                        </template>
                        </multiselect>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="changeLang" v-model="changeLang">
                            @lang("Chapters names in Arabic")
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="type">@lang('What kind of help do you need?')</label>
                        <select id="type" class="custom-select" name="type" v-model="HelpType" required>
                            <option disabled selected value="null"></option>
                            @foreach ($types as $key => $type)
                            <option value="{{ $key }}">@lang($type->en)</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group focused">
                        <label for="fees">@lang("Suitable Fees for you")</label>
                        <input id="fees" class="form-control filled" type="number" name="fees" v-model="fees" required>
                        <small class="form-text text-muted">@lang("If you cannot pay for it, just type 0, it's okay.")</small>
                    </div>

                    <div class="form-group">
                        <label for="name">@lang("Name")</label>
                        <input id="name" class="form-control" type="text" name="name" v-model="name" required>
                    </div>

                    <div class="form-group">
                        <label for="mobile_no">@lang("Mobile Number")</label>
                        <input id="mobile_no" class="form-control" type="number" name="mobile_no" v-model="mobile_no" pattern="[0-9]{11}" required>
                    </div>

                    {{-- <div class="form-group">
                        <label for="students_count">@lang("How many students will be attending?")</label>
                        <input id="students_count" class="form-control" type="number" name="students" v-model="students" required>
                        <small class="form-text text-muted">@lang("It's okay to be only one person.")</small>
                    </div> --}}

                    <div class="form-group">
                        <label for="place">@lang('Select your preferred type for class place')</label>
                        <select id="place" class="custom-select" name="place" v-model="place" required>
                            <option disabled selected value="null"></option>
                            @foreach ($places as $key => $item)
                            <option value="{{ $key }}">@lang($item->en)</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                      <label for="address">@lang("Exact Address")</label>
                      <input id="address" type="text" name="address" v-model="address" class="form-control" aria-describedby="helpId" required>
                      <small class="form-text text-muted">@lang("Write the exact address, to make me able to know how to reach it.")</small>
                    </div> --}}

                    <div class="form-group">
                        <label for="content">@lang("Any Additional Information / requests")</label>
                        <textarea id="content" class="form-control" name="content" v-model="content" rows="3"></textarea>
                    </div>


                </div>
                {{-- End 'Booked' section --}}
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="@lang('Submit')" />
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script defer src="https://www.google.com/recaptcha/api.js?render=6Lc447UUAAAAAKUbWbf6jTvZRmxvSOxnKW-VhneB"></script>
<script type="text/javascript" src="{{ mix('js/forms.js') }}" defer></script>
@endsection
