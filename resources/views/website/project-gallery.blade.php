@extends('website.layout.main')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-text">
                        <h2>Project Gallery</h2>
                        <div class="div-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Main Banner Area End ***** -->
    <section class="samples">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @php
                        $types = projectTypes();
                    @endphp
                    <ul class="nav nav-pills mb-3 border-bottom justify-content-center" id="pills-tab" role="tablist">
                        @foreach ($types as $item)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-0 px-4 {{ $loop->first ? 'active' : '' }}"
                                    id="pills-{{ $item->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $item->id }}" type="button" role="tab"
                                    aria-controls="pills-{{ $item->id }}"
                                    aria-selected="true">{{ $item->type }}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($types as $item)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="pills-{{ $item->id }}" role="tabpanel"
                                aria-labelledby="pills-{{ $item->id }}-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div class="pg-card">
                                            <div class="card-inner">
                                                <div class="box">
                                                    <div class="imgBox">
                                                        <img src="assets/images/est-project/est-1.webp" alt="Image">
                                                    </div>
                                                    <div class="icon">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#estimationModal-1" class="iconBox">
                                                            <i class="fas fa-expand-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    <!-- Modal 01 -->
    <div class="modal fade" id="estimationModal-1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 rounded-0">
                <div class="modal-body">
                    <iframe src="assets/images/est-project/EST.PROJECT-1.pdf#toolbar=0" width="100%" height="500"
                        style="border:none"></iframe>
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
