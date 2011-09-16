<?php

/**
 * eZTagsKeyword class inherits eZPersistentObject class
 * to be able to access eztags_keyword database table through API
 *
 */
class eZTagsKeyword extends eZPersistentObject
{
    /**
     * Constructor
     *
     */
    function __construct( $row )
    {
        parent::__construct( $row );
    }

    /**
     * Returns the definition array for eZTagsKeyword
     *
     * @return array
     */
    static function definition()
    {
        return array( 'fields'              => array( 'keyword_id'  => array( 'name'     => 'KeywordID',
                                                                              'datatype' => 'integer',
                                                                              'default'  => 0,
                                                                              'required' => true ),
                                                      'language_id' => array( 'name'     => 'LanguageID',
                                                                              'datatype' => 'integer',
                                                                              'default'  => 0,
                                                                              'required' => true ),
                                                      'keyword'     => array( 'name'     => 'Keyword',
                                                                              'datatype' => 'string',
                                                                              'default'  => '',
                                                                              'required' => true ),
                                                      'locale'      => array( 'name'     => 'Locale',
                                                                              'datatype' => 'string',
                                                                              'default'  => '',
                                                                              'required' => true ) ),
                      'function_attributes' => array(),
                      'keys'                => array( 'keyword_id', 'language_id' ),
                      'class_name'          => 'eZTagsKeyword',
                      'sort'                => array( 'keyword_id' => 'asc', 'language_id' => 'asc' ),
                      'name'                => 'eztags_keyword' );
    }

    /**
     * Returns eZTagsKeyword object for given tag ID and language ID
     *
     * @static
     * @param integer $tagID
     * @param integer $languageID
     * @return eZTagsKeyword
     */
    static function fetch( $tagID, $languageID )
    {
        return eZPersistentObject::fetchObject( self::definition(), null, array( 'keyword_id' => $tagID, 'language_id' => $languageID ) );
    }
}

?>
