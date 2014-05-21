
    $(document).ready(function(){
        var screen_height = $(window).height();
        var screen_width = $(window).width();
            if (screen_width > 500) {
                $('#wrapper').css('height', screen_height);
                $('body').attr({
                    onload: 'resize()'                
                });
            };

        $('.box-nuestas-soluciones a').click(function(){
            $('.box-into-soluciones').css('display', 'none');
            $('.box-nuestas-soluciones a').removeClass('active');
            $('#wrapper').removeClass('back-asesoria');
            $('#wrapper').removeClass('back-orientacion');
            $('#wrapper').removeClass('back-gestion');
            $('#wrapper').removeClass('back-planeacion');
        });

        $('.box-nuestas-soluciones a.link-1').click(function(){
            $('.box-into-soluciones.tab1').css('display', 'block');
            $(this).addClass('active');
            $('#wrapper').addClass('back-asesoria');
        });

        $('.box-nuestas-soluciones a.link-2').click(function(){
            $('.box-into-soluciones.tab2').css('display', 'block');
            $(this).addClass('active');
            $('#wrapper').addClass('back-orientacion');
        });

        $('.box-nuestas-soluciones a.link-3').click(function(){
            $('.box-into-soluciones.tab3').css('display', 'block');
            $(this).addClass('active');
            $('#wrapper').addClass('back-gestion');
        });

        $('.box-nuestas-soluciones a.link-4').click(function(){
            $('.box-into-soluciones.tab4').css('display', 'block');
            $(this).addClass('active');
            $('#wrapper').addClass('back-planeacion');
        });

        $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
                });        

    });


    
    var wrapper = document.getElementById("wrapper");


    function resize() {
    // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight

    if (typeof window.innerWidth != 'undefined') {
    viewportwidth = window.innerWidth,
    viewportheight = window.innerHeight
    }
    // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

    else if (typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0) {
        viewportwidth = document.documentElement.clientWidth,
        viewportheight = document.documentElement.clientHeight
    }   

    // older versions of IE

    else {
        viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
        viewportheight = document.getElementsByTagName('body')[0].clientHeight
    }
    wrapper.style.height = viewportheight+"px";
    }

                               

