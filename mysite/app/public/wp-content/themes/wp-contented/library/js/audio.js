audiojs.events.ready(function() {
    audiojs.createAll();
});

var ias = jQuery.ias({
    container: ".blog-list",
    item: ".item",
    pagination: ".pagination",
    next: ".pagination a"
});

ias.on('rendered', function(items) {

    audiojs.events.ready(function() {
        audiojs.createAll();
    });

});

ias.extension(new IASSpinnerExtension());
ias.extension(new IASTriggerExtension({
    text: 'Load more',
    offset: 3
}));
ias.extension(new IASNoneLeftExtension({
    text: '<span class="no-more-post">There are no more posts.</span>'
}));
ias.extension(new IASPagingExtension());