
// // Get the modal
// var modal = document.getElementById("myModal")
// // Get the image and insert it inside the modal
// var content = document.querySelectorAll("#record")
// // Get the detail class inside content block
// var detail = document.querySelector(".detail")

// // Get the modal image
// var modalImg = document.querySelector('.modal-info #modal-img')
// // Get the modal name
// var modalName = document.querySelector('.modal-info h5')

// content.forEach(function(item){

//   item.addEventListener('click', () => {

//     modal.style.display = "block"

//     console.log(item.id)

//     modalImg.src = document.getElementById(item.id).querySelector('#info-img').src
//     console.log(modalImg.src)
//     modalName.innerHTML = document.getElementById(item.id).querySelector('#record-name').innerHTML
//     console.log(modalName)
//   })

//   var span = document.querySelectorAll('.close')[0]
//     span.onclick = function(){
//       modal.style.display = "none"
//     }
// })

// Get the modal
var modal = document.getElementById("myModal")
// Get the image and insert it inside the modal
var record = document.querySelectorAll("#record")
// select the modal-info
var modalInfo = document.querySelector('.modal-info')
// select the modal-detail
var modalDetail = document.querySelector('.modal-detail')


record.forEach(function(item){

  item.addEventListener('click', () => {

    modal.style.display = "block"
    modalInfo.innerHTML = item.querySelector('.info').innerHTML
    modalDetail.innerHTML = item.querySelector('.record-detail').innerHTML
    
  })

  var span = document.querySelectorAll('.close')[0]
    span.onclick = function(){
      modal.style.display = "none"
    }
})




