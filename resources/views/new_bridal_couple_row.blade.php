<hr class="mb-5"/>

@php $totalCouples = \App\BridalParty::totalCouples(); @endphp

<div class="row" id="">
    <div class="col-3" id="">
        <button class='btn btn-red lighten-1' type='button'>Remove Couple</button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2 class="">Order #{{$totalCouples}}</h2>
    </div>
</div>

<div class="row mb-5">

        <div class="col-6">

            <div class="form-row">

                <div class="col-4">

                    <img src="/images/empty_face.jpg" class="img-fluid" height="300" width="250" />

                    <div class="md-form">

                        <div class="file-field">

                            <div class="btn btn-primary btn-sm float-left">
                                <span>Choose file</span>
                                <input type="file">
                            </div>

                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Change Photo">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-8">

                    <div class="md-form">

                        <input id="title" class="form-control" type="text" name="new_title[]" value="{{ old('title') }}" placeholder="Add A Title For Bridal Party Member" />

                        <label for="title" class="">Title</label>

                            <span class="red-text">{{ $errors->first('title') }}</span>

                    </div>

                    <div class="md-form">

                        <input id="name" class="form-control" type="text" name="new_name[]" value="{{ old('name') }}" placeholder="Enter Bridal Party Member Name" />

                        <label for="name" class="">Name</label>


                            <span class="red-text">{{ $errors->first('name') }}</span>

                    </div>

                    <div class="md-form">

                        <textarea id="blurb" class="form-control md-textarea" type="text" name="new_blurb[]" placeholder="Enter A Story From Bridal Party Member"></textarea>

                        <label for="blurb" class="">Story</label>

                    </div>

                </div>

            </div>

        </div>

    <div class="col-6">

        <div class="form-row">

            <div class="col-4">

                <img src="/images/empty_face.jpg" class="img-fluid" height="300" width="250" />

                <div class="md-form">

                    <div class="file-field">

                        <div class="btn btn-primary btn-sm float-left">
                            <span>Choose file</span>
                            <input type="file">
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Change Photo">
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-8">

                <div class="md-form">

                    <input id="title" class="form-control" type="text" name="new_title[]" value="{{ old('title') }}" placeholder="Add A Title For Bridal Party Member" />

                    <label for="title" class="">Title</label>

                    <span class="red-text">{{ $errors->first('title') }}</span>

                </div>

                <div class="md-form">

                    <input id="name" class="form-control" type="text" name="new_name[]" value="{{ old('name') }}" placeholder="Enter Bridal Party Member Name" />

                    <label for="name" class="">Name</label>


                    <span class="red-text">{{ $errors->first('name') }}</span>

                </div>

                <div class="md-form">

                    <textarea id="blurb" class="form-control md-textarea" type="text" name="new_blurb[]" placeholder="Enter A Story From Bridal Party Member"></textarea>

                    <label for="blurb" class="">Story</label>

                </div>


            </div>

        </div>

    </div>

    <div class="md-form hidden" hidden>

        <input id="order_num" class="form-control hidden" type="number" name="new_order_num[]" value="{{ $totalCouples }}" />

    </div>

</div>