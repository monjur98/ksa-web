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

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3 border-bottom justify-content-center" id="pills-tab" role="tablist">
                        @foreach ($types as $type)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-0 px-4 {{ $loop->first ? 'active' : '' }}"
                                    id="pills-{{ $type->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $type->id }}" type="button" role="tab"
                                    aria-controls="pills-{{ $type->id }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $type->type }}
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($types as $type)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="pills-{{ $type->id }}" role="tabpanel"
                                aria-labelledby="pills-{{ $type->id }}-tab" tabindex="0">

                                @php
                                    $filterProject = $projects->where('type_id', $type->id);
                                @endphp

                                <div class="row">
                                    @forelse ($filterProject as $project)
                                        <div class="col-md-4 mb-4">
                                            <div class="pg-card">
                                                <div class="card-inner">
                                                    <div class="box">
                                                        <div class="imgBox">
                                                            <img src="/storage/{{ $project->thumbnail }}" alt="Image">
                                                        </div>
                                                        <div class="icon">
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#estimationModal-{{ $project->id }}"
                                                                class="iconBox">
                                                                <i class="fas fa-expand-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for each project -->
                                        <div class="modal fade" id="estimationModal-{{ $project->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content border-0 rounded-0">
                                                    <div class="modal-body">
                                                        <iframe src="/storage/{{ $project->project_pdf }}#toolbar=0"
                                                            width="100%" height="500" style="border:none"></iframe>
                                                    </div>
                                                    <div class="modal-footer py-2">
                                                        <button type="button" class="btn btn-secondary btn-sm px-4"
                                                            data-bs-dismiss="modal">
                                                            CLOSE
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">No data found!</p>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
