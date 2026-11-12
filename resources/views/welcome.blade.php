@extends('layouts.public')

@section('content')

    <div class="py-5 bg-white">
        <div class="px-4 my-5 text-center">
            <h1 class="display-5 fw-bold mt-4">Linkora</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Keep your important connections neatly organised, beautifully saved, and always easy to find.</p>
                <div class="d-flex justify-content-sm-center">
                    <a href="#" class="btn btn-primary btn-lg mr-2">Create account</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <h3>Safe by default</h3>
                <p>Protect your contact list with reliable backups and easy recovery when details change or disappear.</p>
            </div>
            <div class="col-lg-4">
                <h3>Smart organisation</h3>
                <p>Group people, add context, and find what you need in seconds with tags and quick filters.</p>
            </div>
            <div class="col-lg-4">
                <h3>Helpful reminders</h3>
                <p>Stay on top of birthdays, follow-ups, and important dates without missing a beat.</p>
            </div>
        </div>
    </div>
    <section class="bg-white">
        <div class="container py-5">
            <h2 class="text-center my-5">Simple to start. Flexible when you grow.</h2>
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Starter</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="pricing-card-title">$0 <small class="text-muted">/ mo</small></h3>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>1,000 contacts</li>
                            <li>1 connected account</li>
                            <li>Core features</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Try for free</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="pricing-card-title">$9 <small class="text-muted">/ mo</small></h3>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>25,000 contacts</li>
                            <li>5 connected accounts</li>
                            <li>Advanced tools</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Business</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="pricing-card-title">$15 <small class="text-muted">/ mo</small></h3>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>50,000 contacts</li>
                            <li>7 connected accounts</li>
                            <li>Priority support</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Talk to sales</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection