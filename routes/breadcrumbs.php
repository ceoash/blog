<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Media
Breadcrumbs::for('media', function ($trail) {
    $trail->parent('home');
    $trail->push('Media', route('media'));
});

// Home > News
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('home');
    $trail->push('News', route('news'));
});

// Home > Services
Breadcrumbs::for('services', function ($trail) {
    $trail->parent('home');
    $trail->push('Services', route('services'));
});

// Home > Events
Breadcrumbs::for('events', function ($trail) {
    $trail->parent('home');
    $trail->push('Events', route('events'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});