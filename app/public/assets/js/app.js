const app = {
    routes : {
        home          : '/home',
        inisession    : "/Session/iniSession",
        login         : "/Session/userAuth",
        register      : "/Register/register",
        prevpost      : '/Posts/getPosts',
        lastpost      : '/Posts/lastPost',
        openpost      : '/Posts/openPost',
        togglelike    : '/Posts/toggleLike',
        togglecomments: '/Posts/getComments',
        savecomment   : '/Posts/saveComment'

    },
    user :{
            sv      : false,
            id      : '',
            name    : '',
            tipo    : ''
    },
    $pp : $("#prev-posts"),
    $lp : $("#content"),

    
}