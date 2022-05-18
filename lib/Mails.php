<?php

    class Mails {

        /**
         * @param string $mailFrom Adresse email d'envoi
         * @param string $mailTo Addresse email de destination
         * @param string $object Objet du mail
         * @param string $message Message du mail
         * @param bool $isHTML Vrai si le mail est au format HTML (pas supporter par les anciens clients mail)
         * @return bool Vrai si l'envoi a réussit, faux sinon
         */
        public static function sendMail(string $mailFrom, string $mailTo, string $object, string $message, bool $isHTML = false) : bool{

            $headers = [
                'From' => $mailFrom,
                'X-Mailer' => 'PHP/' . phpversion()
            ];

            if($isHTML) {
                $headers['MIME-version'] = '1.0';
                $headers['Content-type'] = 'text/html; charset=utf-8';
            }

            return mail($mailTo, $object, $message, $headers);

        }

    }