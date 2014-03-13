<?
if(function_exists('register_sidebar'))
{
    register_sidebar( // Регистрируем "поле для виджета"
        array(
            'name'  => 'Sidebar Widget', // Заголовок для отображения в админке
            'id'  => 'sidebar_wgt', // Идентификатор виджета
            'before_widget' => '<div class="padding"><ul class="ads box">', // Перед виджетов
            'after_widget' => '</ul></div>', // После виджета
            'description'   => 'Sidebar widget', // Описание
            'before_title' => '<h3 class="title">', // Перед заголовком
            'after_title' => '</h3>' // После заголовка
        )
    );
       register_sidebar( // Регистрируем "Поле для виджета"
        array(
            'name'  => 'Head Widget', // Заголовок для отображения в админке
            'id'  => 'head_wgt', // Идентификатор виджета
            'before_widget' => '<div class="padding"><ul class="ads box">', // Перед виджетов
            'after_widget' => '</ul></div>', // После виджета
            'description'   => 'Header widget', // Описание
            'before_title' => '<h3 class="title">', // Перед заголовком
            'after_title' => '</h3>' // После заголовка
        )
    );
}
?>