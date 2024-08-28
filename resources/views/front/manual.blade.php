@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5">
        <h1 class="text-white mb-4">คู่มือให้บริการชาวต่างชาติ</h1>
    </div>
</div>
<div class="container">
    <div class="container-fluid about  py-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading4Lang">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        คู่มือ 4 ภาษา
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="heading4Lang"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <iframe src="{{ asset('files/manual_4lang.pdf') }}" width="100%" height="800"></iframe>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCN">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ภาษาจีน
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingCN"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <iframe src="{{ asset('files/china.pdf') }}" width="100%" height="800"></iframe>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingVN">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        ภาษาเวียดนาม
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingVN"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <iframe src="{{ asset('files/vietnam.pdf') }}" width="100%" height="800"></iframe>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingML">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ภาษามาเลเซีย
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingML"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <iframe src="{{ asset('files/malaysia.pdf') }}" width="100%" height="800"></iframe>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMM">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        ภาษาเมียนมา
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingMM"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <iframe src="{{ asset('files/myanmar.pdf') }}" width="100%" height="800"></iframe>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCD">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        ภาษากัมพูชา
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingCD"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <iframe src="{{ asset('files/cambodia.pdf') }}" width="100%" height="800"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
