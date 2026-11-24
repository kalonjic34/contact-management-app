@extends('layouts.main')

@section('title','Linkora | Your people')

@section('content')

    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 py-4 px-4">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h2 class="mb-1">Your People
                        @if (request()->query('trash'))
                          <small class="text-muted">(In Trash)</small>
                        @endif
                      </h2>
                      <small class="text-muted">Manage your contacts with ease</small>
                    </div>
                    <div>
                      <a href="{{ route('contacts.create') }}" class="btn btn-success rounded-pill px-3"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body p-4 pt-0">
                @include('contacts._filter')
                @if ($message = session('message'))
                  <div class="alert alert-success border-0 rounded-pill px-3 py-2 mb-3 d-flex align-items-center justify-content-between">
                    <span>{{ $message }}</span>
                    @if ($undoRoute=session('undoRoute'))
                      <form action="{{ $undoRoute }}" method="POST" style="display: inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-link p-0 text-success">Undo</button>
                      </form>
                    @endif
                  </div>

                  @endif
                <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 rounded overflow-hidden">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{!! sortable("First Name") !!}</th>
                      <th scope="col">{!! sortable('Last Name') !!}</th>
                      <th scope="col">{!! sortable('Email') !!}</th>
                      <th scope="col">Company</th>
                      <th scope="col" class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody>  
                      @php
                        $show_trash_buttons = request()->query('trash')?true:false
                      @endphp
                    @forelse ($contacts as $index => $contact )
                      @include('contacts._contact',['contact'=>$contact, 'index'=>$index]) 
                    @empty
                      @include('contacts._empty')
                    @endforelse           

                    {{-- @each('contacts._contact', $contacts, 'contact','contacts._empty') --}}
                  </tbody>
                </table>
                </div>

                <div class="mt-3">
                  {{ $contacts->withQueryString()->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection