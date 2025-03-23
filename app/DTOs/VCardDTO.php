<?php
namespace App\DTOs;

class VCardDTO
{
    public function __construct(
        public ?int $user_id,
        public string $name,
        public ?string $last_name,
        public string $phone_number,
        public string $email,
        public ?string $company,
        public ?string $address1,
        public ?string $address2,
        public ?array $social_links,
        public ?string $image_path,
        public ?int $qrcode_id
    ) {}

    public static function fromRequest(array $data, int $user_id): self
    {
        return new self(
            $user_id,
            $data['name'],
            $data['last_name'] ?? null,
            $data['phone_number'],
            $data['email'],
            $data['company'] ?? null,
            $data['address1'] ?? null,
            $data['address2'] ?? null,
            $data['social_links'] ?? [],
            $data['image_path'] ?? null,
            $data['qrcode_id'] ?? null
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
