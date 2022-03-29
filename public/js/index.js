
//アコーディオン
$(function () {
  $('.head-menu').click(function () {
    //矢印
    $('.arrow').toggleClass('active');
    //アコーディオン
    if ($('.arrow').hasClass('active')) {
      $('.head-accordion').addClass('active');
    } else {
      $('.head-accordion').removeClass('active');
    }
  });
  $('.head-accordion a').click(function () {
    $('.arrow').removeClass('active');
    $('.head-accordion').removeClass('active');
  });
});


//POSTモーダル
// $(function () {
//   $('.edit-button').each(function () {
//     $(this).on('click', function () {
//       var target = $(this).data('target');
//       var modal = document.getElementById('#modal_' + target);
//       $('.modal').css('display', 'block');
//       console.log(modal);
//       $(modal).fadeIn();
//       return false;
//     });
//   });
//   $('.edit-done').on('click', function () {
//     $(modal).fadeOut();
//     return false;
//   });
// });

//POSTモーダル
// $(function (e) {
//   e.preventDefault();
//   var button = $(e.target);
//   var title = button.data('title');
//   var buttonID = '#modal_' + title;
//   console.log(buttonID);

// $('#EditModal').on('click', function (e) {
//   e.preventDefault();
//   var button = $(e.target);
//   var id = button.data('id');
//   var title = button.data('title');
//   var url = button.data('url');
//   console.log(id);
// });

//POST編集モーダル
let editModal = function (id) {
  let checkForm = document.querySelector('.editModal-' + id);
  checkForm.style.display = "block";
  $(checkForm).fadeIn();
  return false;
}

// $(buttonID).on('click', function (e) {
// e.preventDefault();
// var button = $(e.target);//モーダルを呼び出すときに使われたボタンを取得
// var title = button.data('title');//data-titleの値を取得
// var url = button.data('url');//data-urlの値を取得
// var modal = $(this);//モーダルを取得
// // //Ajaxの処理はここに
// // //modal-bodyのpタグにtextメソッド内を表示
// modal.find('.update-form').val(title);
// // //formタグのaction属性にurlのデータ渡す
// modal.find('form').attr('action', url);
// $('#EditModal').css('display', 'block');
// console.log(modal);
// $(modal).fadeIn();
// return false;


//trashアイコン変更
$('.delete-button').each(function () {
  let trash_off = $(this).attr('src');
  let trash_on = $(this).attr('src').replace('off', 'on');
  $(this).hover(
    function () {
      $(this).attr('src', trash_on);
    },
    function () {
      $(this).attr('src', trash_off);
    }
  );
});
