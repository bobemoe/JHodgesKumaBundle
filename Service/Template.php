<?php

    namespace JHodges\KumaBundle\Service;

    use Doctrine\ORM\EntityManager;
    use Symfony\Component\Security\Core\SecurityContextInterface;
    use Kunstmaan\AdminBundle\Helper\Security\Acl\AclHelper;

    use Kunstmaan\AdminBundle\Helper\Security\Acl\Permission\PermissionMap;
    use Kunstmaan\NodeBundle\Helper\NodeMenu;

    use Symfony\Component\HttpKernel\Exception\HttpException;
    use Symfony\Component\Security\Core\Exception\AccessDeniedException;

    class Template{

        public function __construct(EntityManager $em, SecurityContextInterface $securityContext, AclHelper $aclHelper, NodeMenu $nodeMenu){
            $this->em=$em;
            $this->securityContext=$securityContext;
            $this->aclHelper=$aclHelper;
            $this->nodeMenu = $nodeMenu;
        }

        public function getVars($url,$locale,$vars=array()){
            $nodeTranslation = $this->em->getRepository('KunstmaanNodeBundle:NodeTranslation')->getNodeTranslationForUrl($url, $locale);

            if (!$nodeTranslation) {
                throw new HttpException(404,'No page found for slug ' . $url);
            }

            if (!$nodeTranslation->isOnline()) {
                throw new HttpException(404,'The requested page is not online');
            }

            $node   = $nodeTranslation->getNode();
            if (false === $this->securityContext->isGranted(PermissionMap::PERMISSION_VIEW, $node)) {
                throw new AccessDeniedException('You do not have sufficient rights to access this page.');
            }

            $entity = $nodeTranslation->getPublicNodeVersion()->getRef($this->em);

            $nodeMenu = $this->nodeMenu;
            $nodeMenu->setLocale($locale);
            $nodeMenu->setCurrentNode($node);

            return array_merge($vars,array(
                'nodetranslation' => $nodeTranslation,
                'slug'            => $url,
                'page'            => $entity,
                'resource'        => $entity,
                'nodemenu'        => $nodeMenu,
            ));
        }

    }
