## 学习《大话设计模式》的整理代码

### 单一职责

##### 就一个类而言，应该仅有一个引起它变化的原因。

- 如果一个类承担的职责过多，就等于把这些职责耦合在一起，
一个职责的变化可能会削弱或者抑制这个类完成其他职责的能力。
这种耦合会导致脆弱的设计，当变化产生时，设计会遭到意想不到的破坏。

- 软件设计真正要做的许多内容，就是发现职责并把那些职责相互分离。
如果你能够想到多余一个的动机去改变一个类，那么这个类就具有多余一个的职责。

### 开放-封闭原则

##### 软件实体（类、模块、函数等等）应该可以扩展，但是不可修改。

- 对于扩展是开放的，对于更改是封闭的。

- 怎样的设计才能面对需求的改变却可以保持相对稳定，从而使得系统
可以在第一个版本以后不断推出新的版本呢？

- 无论模块是多么的封闭，都会存在一些无法对之封闭的变化。即然不可能完全封闭，
设计人员必须对于他设计的模块应该对那种变化封闭做出选择。
他必须先猜测出最有可能发生变化的种类，然后构造抽象来隔离那些变化。

- 我们可以在发生小变化时，就及早去想办法应对发生更大变化的可能。
等到变化发生时立即采取行动。在我们最初编程写代码时，假设变化不会发生，
当变化发生时，我们就创建抽象来隔离以后发生的同类变化。

- 面对需求，对程序的改动是通过增加新的代码进行的，而不是更改现有的代码。

- 我们希望的是在开发工作展开不久就可以知道能发生的变化。
查明可能发生的变化所等待的时间越长，要创建正确的抽象就越难。

- 开发人员应该仅对程序中呈现出频繁变化的那些部分做出抽象，然而，
对于应用程序中的每个部分都刻意地进行抽象同样不是一个好主意。
拒绝不成熟的抽象和抽象本身一样重要。

### 依赖倒转原则

##### 高层模块不应该依赖低层模块，两个都应该依赖抽象。
##### 抽象不应该依赖细节，细节应该依赖抽象。

- 针对接口编程，不要对现实编程。

- 依赖倒转其实可以说是面向对象设计的标志，用那种语言来编写程序不重要，
如果编写时考虑的都是如何针对抽象编程而不是针对细节编程，
即程序中所有的依赖关系都是终止于抽象类或者接口，那么就是面向对象的设计，
反之那就是过程化的设计了。

1. 依赖注入时，我们应该依赖接口，而不是某个具体的类，由高层直接绑定依赖关系。
2. 测试驱动开发，先写好单元测试类，测试类依赖的是接口，具体的实现可以后面开发。

### 里氏代换原则

##### 子类型必须能够替换掉它们的父类型。

- 一个软件实体如果使用的是一个父类的话，那么一定适用于子类，
而它察觉不出父类对象和子类对象的区别。也就是说，在软件里面，
把父类都替换成它的子类，程序的行为没有变化。

- 只有当子类可以替换掉父类，软件单位的功能不受影响时，
父类才能真正被复用，而子类也能够在父类的基础上增加新的行为。

- 正是由于子类型的可替换性才使得使用父类类型的模块在无修改的情况下就可以扩展。

1. 子类必须完全实现父类的方法
2. 子类可以有自己的个性

### 迪米特法则（最少知识原则）

##### 如果两个类不必彼此直接通信，那么这两个类就不应当发生直接
的相互作用。如果其中一个类需要调用另一个类的某一个方法的话，
可以通过第三者转发这个调用。

- 在类的结构设计上，每一个类都应当尽量降低成员的访问权限。

- 迪米特法则其根本思想，是强调了类之间的松耦合。

- 类之间的耦合越弱，越有利于复用，一个处在弱耦合的类被修改，
不会对有关系的类造成波及。

### 合成/聚合复用原则

##### 尽量使用合成/聚合，尽量不要使用类继承

- 子类的实现与它的父类有非常紧密的依赖关系，以至于父类实现中的任何变化必然会导致子类发生变化。
当你需要复用子类时，如果继承下来的实现不适合解决新的问题，则父类必须重写或被其它更适合的类替换，
这中依赖关系限制了灵活性并最终限制了复用性。

- 聚合表示一种弱的拥有关系，体现的是A对象可以包含B对象，
但B对象不是A对象的一部分；合成则是一种强拥有关系，体现了严格
的部分和整体的关系，部分和整体的生命周期一样。

- 优先使用对象的合成/聚合将有助于你保持每个类被封装，并被集中
在单个任务上，这样类和类继承的层次会保持较小规模，并且不太可能增长为不可控制的庞然大物。

## 设计模式
- [抽象工厂模式](https://github.com/wenjy/design_patten_php/blob/master/src/AbstractFactory.php)
> 提供一个创建一系列相关或相互依赖对象的接口，而无需指定它们具体的类
- [适配器模式](https://github.com/wenjy/design_patten_php/blob/master/src/Adapter.php)
> 将一个类的接口转换成客户所希望的另外的接口。 Adapter 模式使得原本由于接口不兼容而不能一起工作的那些类可以一起工作。
- [桥接模式](https://github.com/wenjy/design_patten_php/blob/master/src/Bridge.php)
> 将抽象部分与它的实现部分分离，使它们都可以独立地变化
- [建造者模式](https://github.com/wenjy/design_patten_php/blob/master/src/Builder.php)
> 将一个复杂的对象的结构与它的表示分离，使得同样的构建过程可以创建不同的表示
- [职责链模式](https://github.com/wenjy/design_patten_php/blob/master/src/ChainOfResponsibility.php)
> 使多个对象都有机会处理请求，从而避免请求的发送者和接收者之间的耦合关系
  将这个对象连成一条链，并沿着这条链传递该请求，直到有一个对象处理它为止。
- [命令模式](https://github.com/wenjy/design_patten_php/blob/master/src/Command.php)
> 将一个请求封装为一个对象，从而使你可以用不同的请求对客户进行参数化；
  对请求排队或记录请求日志，以及支持可撤销的操作
- [组合模式](https://github.com/wenjy/design_patten_php/blob/master/src/Composite.php)
> 将对象组合成树形结构已表示部分-整体的层次结构。组合模式使得用户对单个对象和组合对象的使用具有一致性。
- [装饰模式](https://github.com/wenjy/design_patten_php/blob/master/src/Decorator.php)
> 动态的给一个对象添加一些额外的职责，就增加功能来说，装饰模式比生成子类更为灵活。
- [外观模式](https://github.com/wenjy/design_patten_php/blob/master/src/Facade.php)
> 为子系统中的一组接口提供一个一致的界面，此模式定义了一个高层接口，这个接口使得这一子系统更加容易使用
- [工厂方法模式](https://github.com/wenjy/design_patten_php/blob/master/src/FactoryMethod.php)
> 定义一个用于创建对象的接口，让子类决定实例化哪一个类，工厂方法使一个类的实例化延迟到子类
- [享元模式](https://github.com/wenjy/design_patten_php/blob/master/src/Flyweight.php)
> 运用共享技术有效地支持大量细粒度的对象
- [解释器模式](https://github.com/wenjy/design_patten_php/blob/master/src/Interpreter.php)
> 给定一个语言，定义它的文法的一种表示，并定义一个解释器，
  这个解释器使用该表示来解释语言中的句子
- [中介者模式](https://github.com/wenjy/design_patten_php/blob/master/src/Mediator.php)
> 用一个中介对象来封装一系列的对象交互。中介者使各个对象不需要显式地相互引用，
  从而使其耦合松散，而且可以独立地改变它们之间的交互
- [备忘录模式](https://github.com/wenjy/design_patten_php/blob/master/src/Memento.php)
> 在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态。
  这样以后就可以将该对象恢复都原先保存的状态。
- [观察者模式](https://github.com/wenjy/design_patten_php/blob/master/src/Observer.php)
> 定义了一种一对多的依赖关系，让多个观察者对象同时监听一个主题对象。
  这个主题对象在状态发生变化时，会通知所有观察者对象，使它们能够自动更新自己。
- [简单工厂模式](https://github.com/wenjy/design_patten_php/blob/master/src/Operation.php)
> 用一个工厂来创建我们所需要的类
- [原型模式](https://github.com/wenjy/design_patten_php/blob/master/src/Prototype.php)
> 用原型实例指定创建对象的种类，并且通过拷贝这些原型创建新的对象
- [代理模式](https://github.com/wenjy/design_patten_php/blob/master/src/Proxy.php)
> 为其他对象提供一种代理以控制对这个对象的访问
- [单例模式](https://github.com/wenjy/design_patten_php/blob/master/src/Singleton.php)
> 保证一个类仅有一个实例，并提供一个访问它的全局访问点
- [状态模式](https://github.com/wenjy/design_patten_php/blob/master/src/State.php)
> 当一个对象的内在状态改变时允许改变其行为，这个对象看起来是改变了其类
- [状态模式1](https://github.com/wenjy/design_patten_php/blob/master/src/StateWork.php)
- [策略模式](https://github.com/wenjy/design_patten_php/blob/master/src/Strategy.php)
> 它定义了算法家族，分别封装起来，让它们之间可以相互替换，此模式让算法的变化，不会影响到使用算法的用户
- [模板方法模式](https://github.com/wenjy/design_patten_php/blob/master/src/TemplateMethod.php)
> 定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。模板方法使得子类可以不改变一个算法的结构即可重新定义该算法的某些特定步骤
- [访问者模式](https://github.com/wenjy/design_patten_php/blob/master/src/Visitor.php)
> 表示一个作用于某对象结构中的各元素的操作，它使你可以在不改变各元素的类的前提下定义作用于这些元素的新操作
