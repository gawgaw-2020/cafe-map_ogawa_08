function selectBook(self) {
  $('#js-preview-image').show();
  $('#gazou').remove();

  let selectedTargetID = self.getAttribute('id');

  let selectedTitle = $(`#${selectedTargetID}`).find('.title-text')[0].innerHTML;
  let selectedAuthor = $(`#${selectedTargetID}`).find('.authors-text')[0].innerHTML;
  let selectedDescription = $(`#${selectedTargetID}`).find('.description-text')[0].innerHTML;
  let selectedPublishedDate = $(`#${selectedTargetID}`).find('.published-date-text')[0].innerHTML;
  let selectedImageUrl = $(`#${selectedTargetID}`).find('.image').attr('src');

  if (selectedAuthor === 'undefined') {
    selectedAuthor = '';
  }
  if (selectedDescription == 'undefined') {
    selectedDescription = '';
  }
  if (selectedPublishedDate === 'undefined') {
    selectedPublishedDate = '';
  }

  $('#js-input-book_name').val(selectedTitle);
  $('#js-input-book_author').val(selectedAuthor);
  $('#js-input-book_memo').val(selectedDescription);
  $('#js-input-book_published').val(selectedPublishedDate);
  $('#js-preview-image').attr('src', selectedImageUrl);
  $('#js-hidden-image').attr('value', selectedImageUrl);

  localStorage.setItem('searchBookUrl', selectedImageUrl);

}
