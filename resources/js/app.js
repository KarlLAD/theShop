import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.start();

$(document).ready(
    () => {

        // document chargé : 
        console.log('document chargé')
        // find selected quantity
        $(".cartChangeQuantity").change(
            (event) => {
              // console.log('quantity :', event.target.value) ;
              // console.log('id :', event.target.id) ;

              //coté client
              const quantity = event.target.value ;
              const id       = event.target.id ;
              $('#total').text(12);

              // on envoie les données en ajax comme une API
              $.ajax('/cart/update/'+id+'/'+quantity).done(
                res => {
                  console.log('result', res.result);
                  console.log('total', res.total);
                  $("#total").text(res.total);
                }
              )

            }

        ) //end change quantity

        /********
         * gestion du moteur de recherche
         * 
         */
        $("#search").autocomplete(
            {
                source: function( request, response ) {
                    $.ajax( {
                      url: "/search/"+request.term,  // url déclencher au début
                      /* dataType: "jsonp",
                      data: {
                        term: request.term
                      }, */
                      success: function( data ) {
                        //boucle de la fonction : data.map

                        const dataName = data.map(item=>item.name) ;

                        response( dataName );
                        console.log(data);
                      }
                    } );
                  },
                  minLength: 2,
                  select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                  }
            }
        )

    }
)
 // en ready

// let selectCart = document.querySelector('.cartChangeQuantity ') ;

// selectCart.addEventListener(
// "change",
// () => {



// }
// )

// redirection pour vider la panier : => non utilisé
function emptyCart() {
    window.location = "/cart/delete"
}
/********************
 ** Change la quantitée de produit dans la panier
 ** paramètre id : cart
 *********************/
const changeQuantity = (id = 0) => {
    console.log(' changeQuantity debut');
    console.log('cart Id :', id);
    console.log('cart Id :', this);




    console.log(' changeQuantity fin');


}
