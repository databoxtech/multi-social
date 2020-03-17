<?php


namespace databoxtech\multisocial\adapter;


use databoxtech\multisocial\ApplyConfig;
use databoxtech\multisocial\Attachment;
use databoxtech\multisocial\exception\SocialException;
use Facebook\Exceptions\FacebookSDKException;

/**
 * Class Facebook : facebook adapater for multi social library
 * @package databoxtech\multisocial\Adapter
 *
 * Ref: https://developers.facebook.com/docs/graph-api/photo-uploads/
 *
 */
class Facebook implements SocialAdapter
{

    use ApplyConfig;

    private  $app_id = '';
    private  $app_secret = '';
    private  $default_graph_version = 'v2.10';
    private  $access_token = '';
    private  $page_id = '';

    /**
     * @var \Facebook\Facebook
     */
    private  $client;

    /**
     * @inheritDoc
     */
    public function __construct($config)
    {
        $this->apply_config($config, ['app_id', 'app_secret', 'access_token', 'page_id']);

        try{
            $this->client = new \Facebook\Facebook([
                'app_id' => $this->app_id,
                'app_secret' => $this->app_secret,
                'default_graph_version' => $this->default_graph_version,
            ]);
        }catch (FacebookSDKException $ex){
            throw new SocialException(self::class, $ex->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function post($post)
    {
        $data = [
            'caption' => $post->getCaption(),
            'message' => $post->getDescription(),
        ];
        $a = 0;
        if(count($post->getAttachments()) > 0){
            try{
                $data["attached_media[{$a}]"] = $this->upload_attachments($post->getAttachments());
            }catch (FacebookSDKException $ex){
                throw new SocialException(self::class, $ex->getMessage());
            }
        }

        try{
            $response = $this->client->post("{$this->page_id}/feed", $data, $this->access_token);
            $id = $response->getGraphNode()->getField('id', null);
        }catch (FacebookSDKException $ex){
            throw new SocialException(self::class, $ex->getMessage());
        }

        if($id == null){
            throw new SocialException(self::class, 'Error creating post');
        }
        return $id;
    }

    /**
     * @param Attachment[] $attachments
     * @return array
     * @throws FacebookSDKException
     * @throws SocialException
     */
    private function upload_attachments(array $attachments){
        $ids = [];
        foreach ($attachments as $attachment){
            $endpoint = "{$this->page_id}/photos";
            if($attachment->getType() == Attachment::TYPE_VIDEO){
                $endpoint = "{$this->page_id}/videos";
            }

            $response = $this->client->post($endpoint, [
                'published' => false,
                'caption' => $attachment->getCaption(),
                'source' => $this->client->fileToUpload($attachment->getPath())
            ], $this->access_token);
            $id = $response->getGraphNode()->getField('id', null);
            if($id == null){
                throw new SocialException(self::class, 'Error uploading file');
            }
            $ids[] = $id;
        }
        return $ids;
    }

}