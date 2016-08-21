$( document ).ready(function() {
  $('#fullpage').fullpage({
        css3: true,
        navigation: true,
        navigationPosition: 'right',
        navigationTooltips: ['Engagements',
                             'Weddings',
                             'Trash the dress',
                             'Child & Family',
                             'Pregnancy',
                             'Portraits',
                             'Events',
                             'Travels'],
        afterLoad: function(anchorLink, index){
          if(index == 1){
            console.log(index);
            $('#section0').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section0').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
          if(index == 2){
            console.log(index);
            $('#section1').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section1').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
          if(index == 3){
            console.log(index);
            $('#section2').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section2').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
          if(index == 4){
            console.log(index);
            $('#section3').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section3').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
           if(index == 5){
            console.log(index);
            $('#section4').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section4').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
           if(index == 6){
            console.log(index);
            $('#section5').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section5').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
           if(index == 7){
            console.log(index);
            $('#section6').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section6').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
           if(index == 8){
            console.log(index);
            $('#section7').find(".elemento-animado").addClass("fade-in-from-bottom-animacion");
          }else{
            $('#section7').find(".elemento-animado").removeClass("fade-in-from-bottom-animacion");
          }
        }
      });
});