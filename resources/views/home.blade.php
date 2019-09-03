@extends('layouts.app')
@section('title',__('Home'))
@section('content')
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    bulma
                </h1>
                <h2 class="subtitle">
                    Starter Template for bulma
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="tile is-ancestor">
            <div class="tile">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-primary">
                        <p class="title">Heading</p>
                        <p class="subtitle">Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
                            tellus
                            ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                            risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            View details »</p>
                        <a class="button">view details</a>
                    </article>
                </div>
            </div>
            <div class="tile">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <p class="title">Heading</p>
                        <p class="subtitle">Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
                            tellus
                            ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                            risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            View details »</p>
                        <a class="button">view details</a>
                    </article>
                </div>
            </div>
            <div class="tile">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-warning">
                        <p class="title">Heading</p>
                        <p class="subtitle">Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
                            tellus
                            ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                            risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            View details »</p>
                        <a class="button">view details</a>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection