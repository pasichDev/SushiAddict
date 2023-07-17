<?php

$app->get('/api_public/category/{parram_q}', 'ApiCategoryPublic:index');

$app->get('/api_public/products/{parram_q}', 'ApiProductsPublic:index');
