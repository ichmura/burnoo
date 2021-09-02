/* LikeCarousel (c) 2019 Simone P.M. github.com/simonepm - Licensed MIT */


        class Carousel {
			


            constructor(element) {

                this.board = element	

                // add first two cards programmatically
                this.push()
                this.push()
				this.push()

                // handle gestures
                this.handle()
		
					
				let self = this;
				
				
				$(document).on('click', '#press_back', function() {
					if (!self.isClicked) {
					self.backIsClicked = true
					self.onBack('back')
					}
				});
					
				$(document).on('click', '#press_heart', function() {
					
					if (!self.isClicked) {
					self.onNext('heart')
					self.isClicked = true
					}
	
				});
				
				$(document).on('click', '#press_noheart', function() {
					if (!self.isClicked) {
					self.onNext('noheart')
					self.isClicked = true
					}
				});
				
				$(document).on('click', '#press_fire', function() {
					if (!self.isClicked) {
					self.onNext('fire')
					self.isClicked = true
					}
				});


				
				
            }
			
	

            handle() {

                // list all cards
                this.cards = this.board.querySelectorAll('.card')
  	
                // get top card
                this.topCard = this.cards[this.cards.length - 1]

                // get next card
                this.nextCard = this.cards[this.cards.length - 2]
				
				

                // if at least one card is present
                if (this.cards.length > 0) {

                    // set default top card position and scale
                    this.topCard.style.transform =
                        'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'

                    // destroy previous Hammer instance, if present
                    if (this.hammer) this.hammer.destroy()

                    // listen for tap and pan gestures on top card
                    this.hammer = new Hammer(this.topCard)
                    this.hammer.add(new Hammer.Tap())
                    this.hammer.add(new Hammer.Pan({
                        position: Hammer.position_ALL,
                        threshold: 0
                    }))

                    // pass events data to custom callbacks
                   // this.hammer.on('tap', (e) => {
                   //     this.onTap(e)
                   //  })
                    this.hammer.on('pan', (e) => {
                        this.onPan(e)
                    })
					

					
				


                }

            }
			
			onBack(button) {
				
			this.board.appendChild(this.p_back)
			
			this.handle()
				
			}
			
			onNext(button) {
							
				
				if (!this.isPanning) {

                    this.isPanning = true

                    // remove transition properties
                    this.topCard.style.transition = null
                    if (this.nextCard) this.nextCard.style.transition = null

                    // get top card bounds
                    let bounds = this.topCard.getBoundingClientRect()


                }



                // scale up next card
                if (this.nextCard) this.nextCard.style.transform =
                    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'



                    this.isPanning = false

                    let successful = false

                    // set back transition properties
                    this.topCard.style.transition = 'transform 400ms ease-out'
                    if (this.nextCard) this.nextCard.style.transition = 'transform 100ms linear'

                    // check threshold and movement direction
                    if (button == 'heart') {
						
					document.getElementById("rateBoard_heart").style.opacity = 100;
					
					
					setTimeout(() => {
						
					// move and rotate top card
               	    this.topCard.style.transform =
                    'translateX(600px) translateY(-200px) rotate(25deg) rotateY(0deg) scale(1)'
					
					document.getElementById("rateBoard_heart").style.opacity = 0;
					}, 300)
					
					successful = true


                    } else if (button == 'noheart') {
						
					document.getElementById("rateBoard_not").style.opacity = 100;
					
					setTimeout(() => {
						
					// move and rotate top card
                	this.topCard.style.transform =
                    'translateX(-1200px) translateY(-250px) rotate(-25deg) rotateY(0deg) scale(1)'
					
					document.getElementById("rateBoard_not").style.opacity = 0;
					}, 300)
					
					successful = true


						
      
                    } else if (button == 'fire') {
						
					let propX = this.board.clientWidth/2
					let posY = this.board.clientHeight*2
					
					document.getElementById("rateBoard_fire").style.opacity = 100;
					
					setTimeout(() => {
						
					// move and rotate top card
                	this.topCard.style.transform =
                    'translateX(-'+ propX +'px) translateY(-'+ posY +'px) rotate(0deg) rotateY(0deg) scale(1)'
					
					document.getElementById("rateBoard_fire").style.opacity = 0;
					}, 300)

                        successful = true
						
      
                    } 

                    if (successful) {
						
						
						
						// save this profil to use in onBack					
						this.p_back = this.topCard


                        // wait transition end
                        setTimeout(() => {
                            // remove swiped card
                            this.board.removeChild(this.topCard)

							if (this.backIsClicked != true) {
                            // add new card
                            this.push()
							}
							
							this.backIsClicked = false
							this.isClicked = false
                            // handle gestures on new top card
                            this.handle()
                        }, 500)
						
						

                    } else {

						this.isClicked = false
                        // reset cards position and size
                        this.topCard.style.transform =
                            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
                        if (this.nextCard) this.nextCard.style.transform =
                            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(0.95)'
							

                    }


            }



            onTap(e) {
				

                // get finger position on top card
                let propX = (e.center.x - e.target.getBoundingClientRect().left) / e.target.clientWidth

                // get rotation degrees around Y axis (+/- 15) based on finger position
                let rotateY = 15 * (propX < 0.05 ? -1 : 1)

                // enable transform transition
                this.topCard.style.transition = 'transform 100ms ease-out'

                // apply rotation around Y axis
                // this.topCard.style.transform =
                //    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(' + rotateY + 'deg) scale(1)'

                // wait for transition end
                setTimeout(() => {
                    // reset transform properties
                    this.topCard.style.transform =
                        'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
                }, 100)

            }

            onPan(e) { 
			

                if (!this.isPanning) {

                    this.isPanning = true

                    // remove transition properties
                    this.topCard.style.transition = null
                    if (this.nextCard) this.nextCard.style.transition = null

                    // get top card coordinates in pixels
                    let style = window.getComputedStyle(this.topCard)
                    let mx = style.transform.match(/^matrix\((.+)\)$/)
                    this.startPosX = mx ? parseFloat(mx[1].split(', ')[4]) : 0
                    this.startPosY = mx ? parseFloat(mx[1].split(', ')[5]) : 0

                    // get top card bounds
                    let bounds = this.topCard.getBoundingClientRect()

                    // get finger position on top card, top (1) or bottom (-1)
                    this.isDraggingFrom =
                        (e.center.y - bounds.top) > this.topCard.clientHeight / 2 ? -1 : 1

                }

                // get new coordinates
                let posX = e.deltaX + this.startPosX
                let posY = e.deltaY + this.startPosY

                // get ratio between swiped pixels and the axes
                let propX = e.deltaX / this.board.clientWidth
                let propY = e.deltaY / this.board.clientHeight

                // get swipe direction, left (-1) or right (1)
                let dirX = e.deltaX < 0 ? -1 : 1

                // get degrees of rotation, between 0 and +/- 45
                let deg = this.isDraggingFrom * dirX * Math.abs(propX) * 45

                // get scale ratio, between .95 and 1
                let scale = (95 + (5 * Math.abs(propX))) / 100

                // move and rotate top card
                this.topCard.style.transform =
                    'translateX(' + posX + 'px) translateY(' + posY + 'px) rotate(' + deg + 'deg) rotateY(0deg) scale(1)'
					
			    let minus_propX = Math.abs(propX)
					
				let percentage_not =  (propX-propY) * 2
				let percentage_fire =  (propY-(-minus_propX)) * 2.5
				let percentage_heart =  (propX+propY) * 2
				
				document.getElementById("rateBoard_not").style.opacity = -percentage_not;
				document.getElementById("rateBoard_fire").style.opacity = -percentage_fire;
				document.getElementById("rateBoard_heart").style.opacity = percentage_heart;
				


					
					

                // scale up next card
                if (this.nextCard) this.nextCard.style.transform =
                    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(' + scale + ')'

                if (e.isFinal) {

                    this.isPanning = false

                    let successful = false

                    // set back transition properties
                    this.topCard.style.transition = 'transform 200ms ease-out'
                    if (this.nextCard) this.nextCard.style.transition = 'transform 100ms linear'

                    // check threshold and movement direction
                    if (propX > 0.25 && e.direction == Hammer.DIRECTION_RIGHT) {

                        successful = true
                        // get right border position
                        posX = this.board.clientWidth

                    } else if (propX < -0.25 && e.direction == Hammer.DIRECTION_LEFT) {

                        successful = true
                        // get left border position
                        posX = -(this.board.clientWidth + this.topCard.clientWidth)

                    } else if (propY < -0.25 && e.direction == Hammer.DIRECTION_UP) {

                        successful = true
                        // get top border position
                        posY = -(this.board.clientHeight + this.topCard.clientHeight)

                    }

                    if (successful) {

                        // throw card in the chosen direction
                        this.topCard.style.transform =
                            'translateX(' + posX + 'px) translateY(' + posY + 'px) rotate(' + deg + 'deg)'

						// Add action to chosen direction
						if (e.direction == Hammer.DIRECTION_RIGHT) { /* alert('prawo') */  }
						if (e.direction == Hammer.DIRECTION_LEFT) { /* alert('lewo') */ }
						if (e.direction == Hammer.DIRECTION_UP) { /* alert('góra') */ }
						
						document.getElementById("rateBoard_not").style.opacity = 0;
						document.getElementById("rateBoard_fire").style.opacity = 0;
						document.getElementById("rateBoard_heart").style.opacity = 0;

						// save this profil to use in onBack					
						this.p_back = this.topCard.cloneNode(true);
						
                        // wait transition end
                        setTimeout(() => {
                            // remove swiped card
                            this.board.removeChild(this.topCard)
							if (this.backIsClicked != true) {
                            // add new card
                            this.push()
							}
							this.backIsClicked = false
                            // handle gestures on new top card
                            this.handle()
                        }, 200)

                    } else {

                        // reset cards position and size
                        this.topCard.style.transform =
                            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
							
						document.getElementById("rateBoard_not").style.opacity = 0;
						document.getElementById("rateBoard_fire").style.opacity = 0;
						document.getElementById("rateBoard_heart").style.opacity = 0;
							
                        if (this.nextCard) this.nextCard.style.transform =
                            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(0.95)'

                    }
					
					

                }

            }
			
			


            push() {
				

                let card = document.createElement('div')
				card.id = 'new_cart';
				$("#new_cart").load('profile_next.php');
				
                card.classList.add('card')


                this.board.insertBefore(card, this.board.firstChild)

            }

        }