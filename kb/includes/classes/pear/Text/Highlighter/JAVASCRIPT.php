<?php
/**
 * Auto-generated class. JAVASCRIPT syntax highlighting 
 *
 * PHP version 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @copyright  2004-2006 Andrey Demenev
 * @license    http://www.php.net/license/3_0.txt  PHP License
 * @link       http://pear.php.net/package/Text_Highlighter
 * @category   Text
 * @package    Text_Highlighter
 * @version    generated from: : javascript.xml 26 2005-04-21 16:31:33Z andrey 
 * @author Andrey Demenev <demenev@gmail.com>
 *
 */

/**
 * @ignore
 */

require_once 'Text/Highlighter.php';

/**
 * Auto-generated class. JAVASCRIPT syntax highlighting
 *
 * @author Andrey Demenev <demenev@gmail.com>
 * @category   Text
 * @package    Text_Highlighter
 * @copyright  2004-2006 Andrey Demenev
 * @license    http://www.php.net/license/3_0.txt  PHP License
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Text_Highlighter
 */
class  Text_Highlighter_JAVASCRIPT extends Text_Highlighter
{
    var $_language = 'javascript';

    /**
     * PHP4 Compatible Constructor
     *
     * @param array  $options
     * @access public
     */
    function Text_Highlighter_JAVASCRIPT($options=array())
    {
        $this->__construct($options);
    }


    /**
     *  Constructor
     *
     * @param array  $options
     * @access public
     */
    function __construct($options=array())
    {

        $this->_options = $options;
        $this->_regs = array (
            -1 => '/((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)\\/\\*)|((?i)")|((?i)\')|((?i)\\/\\/)|(\\/)|((?i)[a-z_]\\w*)|((?i)\\d*\\.?\\d+)/',
            0 => '/((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)\\/\\*)|((?i)")|((?i)\')|((?i)\\/\\/)|(\\/)|((?i)[a-z_]\\w*)|((?i)\\d*\\.?\\d+)/',
            1 => '/((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)\\/\\*)|((?i)")|((?i)\')|((?i)\\/\\/)|(\\/)|((?i)[a-z_]\\w*)|((?i)\\d*\\.?\\d+)/',
            2 => '/((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)\\/\\*)|((?i)")|((?i)\')|((?i)\\/\\/)|(\\/)|((?i)[a-z_]\\w*)|((?i)\\d*\\.?\\d+)/',
            3 => '/((?i)((https?|ftp):\\/\\/[\\w\\?\\.\\-\\&=\\/%+]+)|(^|[\\s,!?])www\\.\\w+\\.\\w+[\\w\\?\\.\\&=\\/%+]*)|((?i)\\w+[\\.\\w\\-]+@(\\w+[\\.\\w\\-])+)|((?i)\\b(note|fixme):)|((?i)\\$\\w+:.+\\$)/',
            4 => '/((?i)\\\\\\\\|\\\\"|\\\\\'|\\\\`|\\\\t|\\\\n|\\\\r)/',
            5 => '/((?i)\\\\\\\\|\\\\"|\\\\\'|\\\\`)/',
            6 => '/((?i)((https?|ftp):\\/\\/[\\w\\?\\.\\-\\&=\\/%+]+)|(^|[\\s,!?])www\\.\\w+\\.\\w+[\\w\\?\\.\\&=\\/%+]*)|((?i)\\w+[\\.\\w\\-]+@(\\w+[\\.\\w\\-])+)|((?i)\\b(note|fixme):)|((?i)\\$\\w+:.+\\$)/',
            7 => '/((?i)\\\\\\/)/',
        );
        $this->_counts = array (
            -1 => 
            array (
                0 => 0,
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
            ),
            0 => 
            array (
                0 => 0,
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
            ),
            1 => 
            array (
                0 => 0,
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
            ),
            2 => 
            array (
                0 => 0,
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
            ),
            3 => 
            array (
                0 => 3,
                1 => 1,
                2 => 1,
                3 => 0,
            ),
            4 => 
            array (
                0 => 0,
            ),
            5 => 
            array (
                0 => 0,
            ),
            6 => 
            array (
                0 => 3,
                1 => 1,
                2 => 1,
                3 => 0,
            ),
            7 => 
            array (
                0 => 0,
            ),
        );
        $this->_delim = array (
            -1 => 
            array (
                0 => 'brackets',
                1 => 'brackets',
                2 => 'brackets',
                3 => 'comment',
                4 => 'quotes',
                5 => 'quotes',
                6 => 'comment',
                7 => 'quotes',
                8 => '',
                9 => '',
            ),
            0 => 
            array (
                0 => 'brackets',
                1 => 'brackets',
                2 => 'brackets',
                3 => 'comment',
                4 => 'quotes',
                5 => 'quotes',
                6 => 'comment',
                7 => 'quotes',
                8 => '',
                9 => '',
            ),
            1 => 
            array (
                0 => 'brackets',
                1 => 'brackets',
                2 => 'brackets',
                3 => 'comment',
                4 => 'quotes',
                5 => 'quotes',
                6 => 'comment',
                7 => 'quotes',
                8 => '',
                9 => '',
            ),
            2 => 
            array (
                0 => 'brackets',
                1 => 'brackets',
                2 => 'brackets',
                3 => 'comment',
                4 => 'quotes',
                5 => 'quotes',
                6 => 'comment',
                7 => 'quotes',
                8 => '',
                9 => '',
            ),
            3 => 
            array (
                0 => '',
                1 => '',
                2 => '',
                3 => '',
            ),
            4 => 
            array (
                0 => '',
            ),
            5 => 
            array (
                0 => '',
            ),
            6 => 
            array (
                0 => '',
                1 => '',
                2 => '',
                3 => '',
            ),
            7 => 
            array (
                0 => '',
            ),
        );
        $this->_inner = array (
            -1 => 
            array (
                0 => 'code',
                1 => 'code',
                2 => 'code',
                3 => 'comment',
                4 => 'string',
                5 => 'string',
                6 => 'comment',
                7 => 'string',
                8 => 'identifier',
                9 => 'number',
            ),
            0 => 
            array (
                0 => 'code',
                1 => 'code',
                2 => 'code',
                3 => 'comment',
                4 => 'string',
                5 => 'string',
                6 => 'comment',
                7 => 'string',
                8 => 'identifier',
                9 => 'number',
            ),
            1 => 
            array (
                0 => 'code',
                1 => 'code',
                2 => 'code',
                3 => 'comment',
                4 => 'string',
                5 => 'string',
                6 => 'comment',
                7 => 'string',
                8 => 'identifier',
                9 => 'number',
            ),
            2 => 
            array (
                0 => 'code',
                1 => 'code',
                2 => 'code',
                3 => 'comment',
                4 => 'string',
                5 => 'string',
                6 => 'comment',
                7 => 'string',
                8 => 'identifier',
                9 => 'number',
            ),
            3 => 
            array (
                0 => 'url',
                1 => 'url',
                2 => 'inlinedoc',
                3 => 'inlinedoc',
            ),
            4 => 
            array (
                0 => 'special',
            ),
            5 => 
            array (
                0 => 'special',
            ),
            6 => 
            array (
                0 => 'url',
                1 => 'url',
                2 => 'inlinedoc',
                3 => 'inlinedoc',
            ),
            7 => 
            array (
                0 => 'special',
            ),
        );
        $this->_end = array (
            0 => '/(?i)\\}/',
            1 => '/(?i)\\)/',
            2 => '/(?i)\\]/',
            3 => '/(?i)\\*\\//',
            4 => '/(?i)"/',
            5 => '/(?i)\'/',
            6 => '/(?mi)$/',
            7 => '/\\/g?i?/',
        );
        $this->_states = array (
            -1 => 
            array (
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => -1,
                9 => -1,
            ),
            0 => 
            array (
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => -1,
                9 => -1,
            ),
            1 => 
            array (
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => -1,
                9 => -1,
            ),
            2 => 
            array (
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => -1,
                9 => -1,
            ),
            3 => 
            array (
                0 => -1,
                1 => -1,
                2 => -1,
                3 => -1,
            ),
            4 => 
            array (
                0 => -1,
            ),
            5 => 
            array (
                0 => -1,
            ),
            6 => 
            array (
                0 => -1,
                1 => -1,
                2 => -1,
                3 => -1,
            ),
            7 => 
            array (
                0 => -1,
            ),
        );
        $this->_keywords = array (
            -1 => 
            array (
                0 => -1,
                1 => -1,
                2 => -1,
                3 => -1,
                4 => -1,
                5 => -1,
                6 => -1,
                7 => -1,
                8 => 
                array (
                    'builtin' => '/^(String|Array|RegExp|Function|Math|Number|Date|Image|window|document|navigator|onAbort|onBlur|onChange|onClick|onDblClick|onDragDrop|onError|onFocus|onKeyDown|onKeyPress|onKeyUp|onLoad|onMouseDown|onMouseOver|onMouseOut|onMouseMove|onMouseUp|onMove|onReset|onResize|onSelect|onSubmit|onUnload)$/',
                    'reserved' => '/^(break|continue|do|while|export|for|in|if|else|import|return|label|switch|case|var|with|delete|new|this|typeof|void|abstract|boolean|byte|catch|char|class|const|debugger|default|double|enum|extends|false|final|finally|float|function|implements|goto|instanceof|int|interface|long|native|null|package|private|protected|public|short|static|super|synchronized|throw|throws|transient|true|try|volatile)$/',
                ),
                9 => 
                array (
                ),
            ),
            0 => 
            array (
                0 => -1,
                1 => -1,
                2 => -1,
                3 => -1,
                4 => -1,
                5 => -1,
                6 => -1,
                7 => -1,
                8 => 
                array (
                    'builtin' => '/^(String|Array|RegExp|Function|Math|Number|Date|Image|window|document|navigator|onAbort|onBlur|onChange|onClick|onDblClick|onDragDrop|onError|onFocus|onKeyDown|onKeyPress|onKeyUp|onLoad|onMouseDown|onMouseOver|onMouseOut|onMouseMove|onMouseUp|onMove|onReset|onResize|onSelect|onSubmit|onUnload)$/',
                    'reserved' => '/^(break|continue|do|while|export|for|in|if|else|import|return|label|switch|case|var|with|delete|new|this|typeof|void|abstract|boolean|byte|catch|char|class|const|debugger|default|double|enum|extends|false|final|finally|float|function|implements|goto|instanceof|int|interface|long|native|null|package|private|protected|public|short|static|super|synchronized|throw|throws|transient|true|try|volatile)$/',
                ),
                9 => 
                array (
                ),
            ),
            1 => 
            array (
                0 => -1,
                1 => -1,
                2 => -1,
                3 => -1,
                4 => -1,
                5 => -1,
                6 => -1,
                7 => -1,
                8 => 
                array (
                    'builtin' => '/^(String|Array|RegExp|Function|Math|Number|Date|Image|window|document|navigator|onAbort|onBlur|onChange|onClick|onDblClick|onDragDrop|onError|onFocus|onKeyDown|onKeyPress|onKeyUp|onLoad|onMouseDown|onMouseOver|onMouseOut|onMouseMove|onMouseUp|onMove|onReset|onResize|onSelect|onSubmit|onUnload)$/',
                    'reserved' => '/^(break|continue|do|while|export|for|in|if|else|import|return|label|switch|case|var|with|delete|new|this|typeof|void|abstract|boolean|byte|catch|char|class|const|debugger|default|double|enum|extends|false|final|finally|float|function|implements|goto|instanceof|int|interface|long|native|null|package|private|protected|public|short|static|super|synchronized|throw|throws|transient|true|try|volatile)$/',
                ),
                9 => 
                array (
                ),
            ),
            2 => 
            array (
                0 => -1,
                1 => -1,
                2 => -1,
                3 => -1,
                4 => -1,
                5 => -1,
                6 => -1,
                7 => -1,
                8 => 
                array (
                    'builtin' => '/^(String|Array|RegExp|Function|Math|Number|Date|Image|window|document|navigator|onAbort|onBlur|onChange|onClick|onDblClick|onDragDrop|onError|onFocus|onKeyDown|onKeyPress|onKeyUp|onLoad|onMouseDown|onMouseOver|onMouseOut|onMouseMove|onMouseUp|onMove|onReset|onResize|onSelect|onSubmit|onUnload)$/',
                    'reserved' => '/^(break|continue|do|while|export|for|in|if|else|import|return|label|switch|case|var|with|delete|new|this|typeof|void|abstract|boolean|byte|catch|char|class|const|debugger|default|double|enum|extends|false|final|finally|float|function|implements|goto|instanceof|int|interface|long|native|null|package|private|protected|public|short|static|super|synchronized|throw|throws|transient|true|try|volatile)$/',
                ),
                9 => 
                array (
                ),
            ),
            3 => 
            array (
                0 => 
                array (
                ),
                1 => 
                array (
                ),
                2 => 
                array (
                ),
                3 => 
                array (
                ),
            ),
            4 => 
            array (
                0 => 
                array (
                ),
            ),
            5 => 
            array (
                0 => 
                array (
                ),
            ),
            6 => 
            array (
                0 => 
                array (
                ),
                1 => 
                array (
                ),
                2 => 
                array (
                ),
                3 => 
                array (
                ),
            ),
            7 => 
            array (
                0 => 
                array (
                ),
            ),
        );
        $this->_parts = array (
            0 => 
            array (
                0 => NULL,
                1 => NULL,
                2 => NULL,
                3 => NULL,
                4 => NULL,
                5 => NULL,
                6 => NULL,
                7 => NULL,
                8 => NULL,
                9 => NULL,
            ),
            1 => 
            array (
                0 => NULL,
                1 => NULL,
                2 => NULL,
                3 => NULL,
                4 => NULL,
                5 => NULL,
                6 => NULL,
                7 => NULL,
                8 => NULL,
                9 => NULL,
            ),
            2 => 
            array (
                0 => NULL,
                1 => NULL,
                2 => NULL,
                3 => NULL,
                4 => NULL,
                5 => NULL,
                6 => NULL,
                7 => NULL,
                8 => NULL,
                9 => NULL,
            ),
            3 => 
            array (
                0 => NULL,
                1 => NULL,
                2 => NULL,
                3 => NULL,
            ),
            4 => 
            array (
                0 => NULL,
            ),
            5 => 
            array (
                0 => NULL,
            ),
            6 => 
            array (
                0 => NULL,
                1 => NULL,
                2 => NULL,
                3 => NULL,
            ),
            7 => 
            array (
                0 => NULL,
            ),
        );
        $this->_subst = array (
            -1 => 
            array (
                0 => false,
                1 => false,
                2 => false,
                3 => false,
                4 => false,
                5 => false,
                6 => false,
                7 => false,
                8 => false,
                9 => false,
            ),
            0 => 
            array (
                0 => false,
                1 => false,
                2 => false,
                3 => false,
                4 => false,
                5 => false,
                6 => false,
                7 => false,
                8 => false,
                9 => false,
            ),
            1 => 
            array (
                0 => false,
                1 => false,
                2 => false,
                3 => false,
                4 => false,
                5 => false,
                6 => false,
                7 => false,
                8 => false,
                9 => false,
            ),
            2 => 
            array (
                0 => false,
                1 => false,
                2 => false,
                3 => false,
                4 => false,
                5 => false,
                6 => false,
                7 => false,
                8 => false,
                9 => false,
            ),
            3 => 
            array (
                0 => false,
                1 => false,
                2 => false,
                3 => false,
            ),
            4 => 
            array (
                0 => false,
            ),
            5 => 
            array (
                0 => false,
            ),
            6 => 
            array (
                0 => false,
                1 => false,
                2 => false,
                3 => false,
            ),
            7 => 
            array (
                0 => false,
            ),
        );
        $this->_conditions = array (
        );
        $this->_kwmap = array (
            'builtin' => 'builtin',
            'reserved' => 'reserved',
        );
        $this->_defClass = 'code';
        $this->_checkDefines();
    }
    
}