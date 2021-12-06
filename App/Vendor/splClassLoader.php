<?php
 
class SplClassLoader
{
    protected   $fileExtension = '.php',
                $namespace,
                $includePath,
                $namespaceSeparateur = '\\';
 
    public function __construct(string $namespace = null, string $includePath = null)
    {
        $this->namespace = $namespace;
        $this->includePath = $includePath;
    }
 
    public function setnamespaceSeparateur($separateur)
    {
        $this->namespaceSeparateur = $separateur;
    }
 
    public function setIncludePath($includePath)
    {
        $this->includePath = $includePath;
    }
 
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;
    }
 
    public function namespaceSeparateur() { return $this->namespaceSeparateur; }
    public function includePath() { return $this->includePath; }
    public function fileExtension() { return $this->fileExtension; }
 
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }
 
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }
 
    public function loadClass($className)
    {
        if (null === $this->namespace || $this->namespace . $this->namespaceSeparateur === substr($className, 0, strlen($this->namespace . $this->namespaceSeparateur)))
        {
            $fileName = '';
            $namespace = '';
 
            if (false !== ($derniereOccurenceNS = strripos($className, $this->namespaceSeparateur)))
            {
                $namespace = substr($className, 0, $derniereOccurenceNS);
                $className = substr($className, $derniereOccurenceNS + 1);
                $fileName = str_replace($this->namespaceSeparateur, DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
 
            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . $this->fileExtension;
             
            require ($this->includePath !== null ? $this->includePath . DIRECTORY_SEPARATOR : '') . $fileName;
        }
    }
}