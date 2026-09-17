php bin/console tailwind:build --watch

src/
├── Product/
│ ├── Domain/
│ │ ├── Entity/
│ │ │ └── Product.php
│ │ ├── ValueObject/
│ │ │ └── Money.php
│ │ ├── Repository/
│ │ │ └── ProductRepositoryInterface.php
│ │ └── Exception/
│ │ └── ProductNotFoundException.php
│ │
│ ├── Application/
│ │ └── CreateProduct/
│ │ ├── CreateProductCommand.php
│ │ └── CreateProductHandler.php
│ │
│ └── Infrastructure/
│ └── Persistence/
│ └── DoctrineProductRepository.php
│
├── Order/
│ ├── Domain/
│ │ ├── Entity/
│ │ │ ├── Order.php
│ │ │ └── OrderItem.php
│ │ ├── Enum/
│ │ │ └── OrderStatus.php
│ │ └── Repository/
│ │ └── OrderRepositoryInterface.php
│ │
│ ├── Application/
│ │ └── CreateOrder/
│ │ ├── CreateOrderCommand.php
│ │ └── CreateOrderHandler.php
│ │
│ └── Infrastructure/
│ └── Persistence/
│ └── DoctrineOrderRepository.php
│
└── UI/
└── Controller/
├── ProductController.php
└── OrderController.php
