package traits

import (
	"github.com/kataras/iris"
)

type (
	originListsCycle struct {
		OriginListsBeforeHooks  func()
		OriginListsCustomReturn func(interface{})
	}
)

func (c *Traits) originListsModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
