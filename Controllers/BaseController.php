
<?php
class BaseController{
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';
    /**
     * Description:
     * + path name: folderName.fileName
     * + Lay tu sau thu muc Views
     */
    protected function view(string $viewPath, array $data = []): string
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        return require(
            self::VIEW_FOLDER_NAME
            . '/'
            . str_replace('.','/',$viewPath)
            . '.php');
    }
    
    protected function loadModel(string $modelPath): string
    {
        return require(self::MODEL_FOLDER_NAME . '/' . $modelPath .
         '.php');
    }

    
}

?>