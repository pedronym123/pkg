$(function(){
    $(`ul.tabs li a:first`).addClass(`active2`);
    $(`.secciones article`).hide();
    $(`.secciones article:first`).show();

    $(`ul.tabs li a`).click(function(){
        $(`ul.tabs li a`).removeClass('active2');
        $(this).addClass('active2');
        $(`.secciones article`).hide();

        var activeTab=$(this).attr(`href`);
        console.log(activeTab);
        $(activeTab).show();
        return false;
    });
});