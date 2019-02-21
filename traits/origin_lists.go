package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) OriginListsModel(ctx iris.Context) (int, error) {
	return ctx.JSON(iris.Map{})
}
