function PublisherName ({ publisher }) {
    return (
      <option value={publisher.PUBLISHER_ID}>
        {
        
        publisher.PUBLISHER_FIRST_NAME + ' ' + publisher.PUBLISHER_LAST_NAME
        
        
        }</option>
    );
};

export default PublisherName;

//COMIC_ID int(11) PK 
// PUBLISHER_ID int(11) 
// AUTHOR_ID int(11) 
// PRICE varchar(50) 
// DATE_ADDED varchar(100) 
// RELEASE_DATE varchar(25) 
// TITLE varchar(256) 
// ISSUE_NUMBER int(11) 
// FRONT_COVER_PHOTO_URL