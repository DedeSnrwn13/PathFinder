

@extends('profile.project')

@section('hoby')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <h4 class="font-weight-bolder">Hobby(s)</h4>
            </div>
            <div class="col-md-7">
                <span class=" d-block">{{ $user->about->hobby_one }}</span>

                <span class=" d-block">{{ $user->about->hobby_two }}</span>

                <span class=" d-block">{{ $user->about->hobby_three }}</span>

                <span class="d-block">{{ $user->about->hobby_four }}</span>

                <span class="d-block">{{ $user->about->hobby_five }}</span>
            </div>
            <div class="col-md-2 float-right">
                <a  href="/jobseeker/profile/{{ $user->id }}/edit"><img src="{{ asset('uploads/img/edit3.png') }}" class="float-right" alt=""></a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('images/smileyface.png') }}" width="30px" alt="">
                    </div>
                    <div class="col-md-10">
                        <h5 class="font-weight-bolder d-block">Strenghts</h5>

                        <span class="d-block">{{ $user->about->strenght_one }}</span>
                        <span class="d-block">{{ $user->about->strenght_two }}</span>
                        <span class="d-block">{{ $user->about->strenght_three }}</span>
                        <span class="d-block">{{ $user->about->strenght_four }}</span>
                        <span class="d-block">{{ $user->about->strenght_five }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('images/frownface.png') }}" width="30px" alt="">
                    </div>
                    <div class="col-md-10">
                        <h5 class="font-weight-bolder d-block">Weaknesses</h5>

                        <span class="d-block">{{ $user->about->weakness_one }}</span>
                        <span class="d-block">{{ $user->about->weakness_two }}</span>
                        <span class="d-block">{{ $user->about->weakness_three }}</span>
                        <span class="d-block">{{ $user->about->weakness_four }}</span>
                        <span class="d-block">{{ $user->about->weakness_five }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
