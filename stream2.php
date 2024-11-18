
<script type="text/javascript">
            $CompteurLive = 0;
            $UpdateCheck = 0;
            
            $(document).ready(function() { setTimeout("UpdateStreams()",100); });
                
            function UpdateStreams() { 
                
                    console.log("Actualisation Stream");
                
                
                    $.ajax({    //create an ajax request to display.php
                        type: "GET",
                        url: "../getlive.php",             
                        dataType: "html",   //expect html to be returned                
                        success: function(response){ 
                        
                        //alert(response);
                        var Reponse = jQuery.parseJSON(response);
                        
                        // pour chaque streameur ont check s'il live ou pas
                        Reponse.forEach(function(object) {
                            console.log(object.PseudoTwitch);
                            var ViewLive = document.querySelector('[Streameur="'+object.PseudoTwitch+'"]');
                            //s'il est en live:
                            if (object.EnLive == "oui") {
                                
                                console.log("En live");
                                //s'il est déjà affiché on update le nombre de viewers
                                if (ViewLive) {
                                    
                                    console.log("déjà affiché");
                                    ViewLive.setAttribute('NbViewers', object.NbViewers);
                                    
                                } 
                                //si il est pas déjà affiché ont l'affiche
                                else {
                                    
                                    $CompteurLive++;
                                    var PremLive = document.createElement("div");
                                    document.getElementById("ToutLesLives").appendChild(PremLive);
                                    PremLive.setAttribute("id", "Live"+$CompteurLive);
                                    PremLive.classList.add("EcranLive");
                                    PremLive.setAttribute('Streameur', object.PseudoTwitch);
                                    PremLive.setAttribute('NbViewers', object.NbViewers);
                                    
                                    PremLive.innerHTML = '<table class="carte"><tbody><tr><td class="carteTitre FondVert">'+object.PseudoTwitch+', '+object.NbViewers+' Viewers</td></tr><tr><td id="EmbedLive'+$CompteurLive+'" class="carteCell"></td></tr></tbody></table>';
                                    
            
                                    new Twitch.Player("EmbedLive"+$CompteurLive, {
                                    width: 423,
                                    height: 240,
                                    channel: object.PseudoTwitch,
                                    muted: true,
                                    });
                                    
                                };
                
                                
                            } 
                            //s'il est pas en live:
                            else {
                                console.log("Pas En live");
                                //s'il est déjà affiché on le supprime
                                if (ViewLive) {
                                    
                                    return ViewLive.parentNode.removeChild(ViewLive);	
                                    
                                } 
                                //si il est pas déjà affiché on fait rien
                                else {
                                    
                                    console.log("Rien à afficher");
                                    
                                }
                            }
                            
                            
                        });
                        
                        }
            
                    });
                
                
                // check si aucun live
                if ($(".EcranLive")[0]){
                    
                    if ($("#PasDeLive")[0]){ 
                    
                        document.getElementById("PasDeLive").remove();
                        
                    }
                    
                } else {
                    
                    if ($("#PasDeLive")[0]){ } else {
                        
                        var PasDeLive = document.createElement("div");
                        document.getElementById("ToutLesLives").appendChild(PasDeLive);
                        PasDeLive.setAttribute("id", "PasDeLive");
                        PasDeLive.classList.add("PasDeLive");
                        PasDeLive.innerHTML = "Aucun live en cours";
                        
                    }
                };
                
                
                // update classement puis reboot
                UpdateClassement();
                
                if ($UpdateCheck == 0) {
                    
                    setTimeout("UpdateStreams()",10000);
                    
                }
                
            };
            
            // fonction classement des lives
            function UpdateClassement() { 
                
                console.log("Actualisation Classement Stream");
            
                $('.EcranLive').each(function() {
                    
                    var Pseudo = $(this).attr('Streameur');
                    var PseudoCible = $(this).prev(".EcranLive").attr('Streameur');
                    // on récup les infos Nb viewers
                    var NbViewersIci = $(this).attr('NbViewers');
                    
                    var NbViewersLaBas = $(this).prev(".EcranLive").attr('NbViewers');
                    
                        // update affichage NB Viewers
                        $(this)[0].querySelector(".carteTitre").innerHTML = Pseudo+', '+NbViewersIci+' Viewers';
                    
                    var diff = NbViewersIci-NbViewersLaBas;
                    
                    console.log(Pseudo+" vs "+PseudoCible+" | "+NbViewersIci+" vs "+NbViewersLaBas+" diff "+diff);
                    
                    // si le nombre est + grand ont le monte
                    if (NbViewersLaBas != null) {
                        
                        if (diff > 0) {
                            $(this).insertBefore($(this).prev(".EcranLive"));
                            console.log("ça monte");
                        } else { console.log("deja plus petit"); } 
                    
                    } else { console.log("contre null ont fait rien"); }
                    
                    
                });
            
            };
            
            function StopUpdate() {
                
                $UpdateCheck++;
                console.log("Click pour stopper l'update");
                
            }
            </script>