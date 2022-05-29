<?php
/**
 * @package php-font-lib
 * @link    https://github.com/PhenX/php-font-lib
 * @author  Fabien Ménager <fabien.menager@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

namespace FontLib\WOFF2;

use FontLib\Table\DirectoryEntry;
use Psl\Shell;

/**
 * WOFF font file.
 *
 * @package php-font-lib
 *
 * @property TableDirectoryEntry[] $directory
 */
class File extends \FontLib\TrueType\File {
  public function load($file) {
    $file = $this->convertWOFF2ToTTF($file);

    parent::load($file);

  }

  public function convertWOFF2ToTTF($file)
  {
    Shell\execute('woff2_decompress', [$file]);

    return str_replace('.woff2', '.ttf', $file);
  }
}
