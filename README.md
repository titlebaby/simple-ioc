# simple-ioc
    在最初实现一个超人（功能），我们是在这个超人的__construct的构造函数中去实例化一系列对象（手动在 “超人” 类中固化了他的 “超能力” 初始化的行为），
    超人所需要的依赖类。
    然后，我们又创造出了工厂模式，我们只在超人的构造函数中实例化这个工厂类，就依赖类转移给了工厂类，取而代之的是在根据实例化超人类时入参的不同，
    在工厂类中调用实例化其他一系列类的方法，进行一系列对象的实例化（实现一系列小功能）。
    最后，IOC控制反转和DI依赖注入的诞生，实现完全的解耦，取消依赖。
    
###DI（依赖注入）
    将前面提到的工厂类改成接口（实现契约），工厂类没有强制规定，作为超人组件必须的条件，
    使用接口（契约），超人的组件类是接口的是现实类，就必须实现接口已有的方法（即满足条件）。
    在超人类中的构造函数的形参中规定参数类型是接口类型的。超人应敌人时需要什么组件类，就
    实例化这个组件对象，在实例化超人的时候作为实参，传入超人的构造函数中，手动造出不同类型
    的超人。如
```
    // 超能力模组
    $superModule = new XPower;
    // 初始化一个超人，并注入一个超能力模组依赖
    $superMan = new Superman($superModule);
 ```   
###IoC（控制反转）
    由外部负责，由外部创造超能力模组、装置或者芯片等（“模组”），植入超人体内的某一个接口，
    这个接口是一个既定的，只要这个 “模组” 满足这个接口的装置都可以被超人所利用，
    可以提升、增加超人的某一种能力。
    这种由外部负责其依赖需求的行为，我们可以称其为 “控制反转（IoC）”。
    手动的创建了一个超能力模组——太lou,衍生出标准化车间（契约），批量造超人组件，
    完成不同的功能。
    就是工厂模式的升华  —— IoC 容器
 这份demo就简单的完成了需要手动提供超人实参（类型）的简版ioc容器，要是现实自动注入需要
 运用php5+提供的反射机制，待研究。。。