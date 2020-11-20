function selectBook(self) {

  const selectedTargetID = self.getAttribute('id');

  const selectedTitle = $(`#${selectedTargetID}`).find('.title-text')[0].innerHTML;
  const selectedAuthor = $(`#${selectedTargetID}`).find('.authors-text')[0].innerHTML;
  const selectedDescription = $(`#${selectedTargetID}`).find('.description-text')[0].innerHTML;
  const selectedPublishedDate = $(`#${selectedTargetID}`).find('.published-date-text')[0].innerHTML;
  const selectedImageUrl = $(`#${selectedTargetID}`).find('.image').attr('src');

  $('#js-input-book_name').val(selectedTitle);
  $('#js-input-book_author').val(selectedAuthor);
  $('#js-input-book_memo').val(selectedDescription);
  $('#js-input-book_published').val(selectedPublishedDate);
  $('#js-preview-image').attr('src', selectedImageUrl);

}
